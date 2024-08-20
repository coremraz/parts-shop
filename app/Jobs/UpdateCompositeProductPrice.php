<?php

namespace App\Jobs;

use App\Models\Product;
use App\ViewModels\ProductViewModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UpdateCompositeProductPrice implements ShouldQueue
{
    use Queueable, SerializesModels, InteractsWithQueue;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle()
    {

        $productModel = new ProductViewModel($this->product);
        $complectation = $productModel->getComplectationProducts();

        $this->product->price = array_sum(array_map(function ($item) {
            $quantity = $item->complectationQuantity()->first() ? $item->complectationQuantity()->first()->quantity : 0;
            return $item->price * $quantity;
        }, $complectation));

        $this->product->save();

    }
}
