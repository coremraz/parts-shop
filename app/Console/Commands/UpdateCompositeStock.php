<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\ViewModels\ProductViewModel;
use Illuminate\Console\Command;
use App\Models\Product;


class UpdateCompositeStock extends Command
{
    /**
     * Имя и сигнатура консольной команды.
     *
     * @var string
     */
    protected $signature = 'products:update-compositeStock';

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
        $productsTotalStock = Product::where('composite_product', 0)->sum('stock');

        if (Setting::find(2)->value != $productsTotalStock) {
            $totalSum = Setting::find(2);
            $totalSum->value = $productsTotalStock;
            $totalSum->save();

            $compositeProducts = Product::where('composite_product', 1)->get();

            foreach ($compositeProducts as $product) {
                $viewModel = new ProductViewModel($product);
                $product->stock = $viewModel->getComplectationStock();
                $product->save();
            }
        }

    }

}
