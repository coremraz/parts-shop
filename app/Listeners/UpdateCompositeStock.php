<?php

namespace App\Listeners;

use App\Events\ProductStockUpdated;
use App\Models\Product;
use App\Models\Product_composite_element;
use App\ViewModels\ProductViewModel;
use Illuminate\Support\Facades\DB;

class UpdateCompositeStock
{
    /**
     * Обработка события обновления остатков товара.
     *
     * @param  \App\Events\ProductStockUpdated  $event
     * @return void
     */
    public function handle(ProductStockUpdated $event)
    {
        $updatedProductArticles = $event->updatedProductArticles;

        // 1. Получаем ID обновленных продуктов:
        $updatedProductIds = Product::whereIn('article', $updatedProductArticles)->pluck('id');

        $compositeProductIds = Product_composite_element::whereIn('product_element_id', $updatedProductIds)
            ->distinct('product_id')
            ->pluck('product_id');

        // Проверка, найдены ли вообще комплекты с измененными товарами
        if ($compositeProductIds->isEmpty()) {
            return; // Если комплектов не найдено, выходим из функции
        }

        // 3. Загружаем только найденные комплекты с eager loading:
        $compositeProducts = Product::with('composite.product')
            ->whereIn('id', $compositeProductIds)
            ->get();


        // 4. Обновляем остатки комплектов в транзакции:
        DB::transaction(function () use ($compositeProducts) {
            foreach ($compositeProducts as $product) {
                $viewModel = new ProductViewModel($product);
                $product->stock = $viewModel->getComplectationStock();
                $product->save();
            }
        });
    }
}
