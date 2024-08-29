<?php

namespace App\Console\Commands;

use App\Jobs\UpdateCompositeProductPrice;
use App\Models\Setting;
use App\ViewModels\ProductViewModel;
use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        // Расчёт цены для комплектов (вычисляем один раз)
        $productsTotalPrice = Product::where('composite_product', 0)->sum('price');

        // Проверка условия ДО цикла chunk
        if (Setting::find(1)->value != $productsTotalPrice) {
            $totalSum = Setting::find(1);
            $totalSum->value = $productsTotalPrice;
            $totalSum->save();

            Product::with('complectationQuantity')
                ->where('composite_product', 1)
                ->chunk(100, function ($compositeProducts) {
                    foreach ($compositeProducts as $product) {
                        $job = new UpdateCompositeProductPrice($product);
                        dispatch($job);
                    }
                    echo  "Chunk dispatched: " . count($compositeProducts) . " products, " . "date: " . now() . "\n";
                });
        }
    }
}
