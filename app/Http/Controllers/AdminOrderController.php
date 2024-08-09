<?php

namespace App\Http\Controllers;

use App\Models\Order_composition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
                // Загрузка файла Excel
                $spreadsheet = IOFactory::load($file->getRealPath());
                $worksheet = $spreadsheet->getActiveSheet();

                // Получение номера заказа из ячейки B1
                $orderNumber = preg_replace('/[^0-9]/', '', $worksheet->getCell('A1')->getValue());

                if (!Order::where('order_number', $orderNumber)->first()) {


                    // Создание нового заказа
                    $order = new Order();
                    $order->order_number = $orderNumber;
                    $order->order_date = Carbon::now();
                    $order->received = 0;
                    $order->save();

                    // Начинаем с третьей строки (индекс 2), так как первые две строки - заголовок
                    $row = 3;

                    while ($worksheet->getCell('A' . $row)->getValue() !== null) {
                        $productModel = $worksheet->getCell('A' . $row)->getValue();
                        $quantity = $worksheet->getCell('B' . $row)->getValue();

                        // Поиск продукта
                        $product = Product::where('title', $productModel)->first();

                        if ($product) {

                            $orderComposition = new Order_composition();
                            $orderComposition->quantity = $quantity;
                            $orderComposition->product_id = $product->id;
                            $orderComposition->order_id = $order->id;
                            try {
                                $orderComposition->save();
                            } catch (\Exception $e) {
                                dd($e->getMessage(), $e->getTraceAsString());
                            }

                        } else {
                            echo 'here';
                        }

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

    public function show(Order $order) {
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
