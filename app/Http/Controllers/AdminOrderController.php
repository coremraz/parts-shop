<?php

namespace App\Http\Controllers;

use App\Models\Order_composition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function upload(Request $request)
    {
        DB::enableQueryLog();
        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            try {
                $spreadsheet = IOFactory::load($file->getRealPath());
                $worksheet = $spreadsheet->getActiveSheet();
                $orderNumber = preg_replace('/[^0-9]/', '', $worksheet->getCell('A1')->getValue());

                if (!Order::where('order_number', $orderNumber)->first()) {
                    $row = 3;
                    $missingProducts = []; // Массив для хранения недостающих товаров

                    // Проверяем все товары перед загрузкой
                    while ($worksheet->getCell('A' . $row)->getValue() !== null) {
                        $productModel = $worksheet->getCell('A' . $row)->getValue();
                        $product = Product::where('title', $productModel)->first();

                        if (!$product) {
                            $missingProducts[] = $productModel;
                        }

                        $row++;
                    }

                    // Если найдены недостающие товары,
                    // возвращаем ошибку и список товаров
                    if (!empty($missingProducts)) {
                        return redirect()->back()->with(
                            'error',
                            'В заказе есть товары, которых нет в базе данных:'
                        )->with(
                            'missingProducts',
                            $missingProducts
                        );
                    }

                    // Если все товары найдены, создаем заказ и order compositions
                    $order = new Order();
                    $order->order_number = $orderNumber;
                    $order->order_date = Carbon::now();
                    $order->received = 0;
                    $order->save();

                    $row = 3;
                    while ($worksheet->getCell('A' . $row)->getValue() !== null) {
                        $productModel = $worksheet->getCell('A' . $row)->getValue();
                        $quantity = $worksheet->getCell('B' . $row)->getValue();

                        $product = Product::where('title', $productModel)->first();

                        $orderComposition = new Order_composition();
                        $orderComposition->quantity = $quantity;
                        $orderComposition->order_id = $order->id;
                        $orderComposition->product_id = $product->id;
                        $orderComposition->status = 'Ок';
                        $orderComposition->save();

                        $row++;
                    }

                    return redirect()->back()->with('success', 'Данные успешно загружены!');
                } else {
                    return redirect()->back()->withErrors(['error' => 'заказ уже есть в базе']);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ошибка при обработке файла: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Ошибка загрузки файла!');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateReceived(Request $request)
    {
        $order = Order::find($request->input('id'));
        if ($order) {
            $order->received = $request->input('received');
            $order->save();
        }
        return response()->json(['success' => true]);
    }
}
