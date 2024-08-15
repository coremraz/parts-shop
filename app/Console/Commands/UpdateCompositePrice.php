<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\ViewModels\ProductViewModel;
use Illuminate\Console\Command;
use App\Models\Product;


class UpdateCompositePrice extends Command
{
    /**
     * Имя и сигнатура консольной команды.
     *
     * @var string
     */
    protected $signature = 'products:update-compositePrice';

    /**
     * Описание консольной команды.
     *
     * @var string
     */
    protected $description = 'Обновление цены и наличия у комплектов, полукомлектов';

    /**
     * Путь к файлу отчета.
     *
     * @var string
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Выполнить консольную команду.
     *
     * @return int
     */
    public function handle()
    {
        //Расчёт цены для комплектов
        $productsTotalPrice = Product::where('composite_product', 0)->sum('price');

        if (Setting::find(1)->value != $productsTotalPrice) {
            $totalSum = Setting::find(1);
            $totalSum->value = $productsTotalPrice;
//            $totalSum->save();
            $compositeProducts = Product::where('composite_product', 1)->get();

            foreach ($compositeProducts as $product) {
                $productModel = new ProductViewModel($product);
                $complectation = $productModel->getComplectationProducts();

                foreach ($complectation as $item) {
                    $product->price += $item->price;
                }

                $product->save();
            }
        }

    }

}
