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

        foreach ($event->changedProducts as $product) {
            foreach ($product->parentComplectation()->get() as $complectation) {
                $viewModel = new ProductViewModel($product);
                $complectation->stock = $viewModel->getComplectationStock();
                $complectation->save();
            }
        }

    }
}
