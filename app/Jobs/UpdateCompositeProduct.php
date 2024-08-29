<?php

namespace App\Jobs;

use App\Models\Product;
use App\ViewModels\ProductViewModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class UpdateCompositeProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        $viewModel = new ProductViewModel($this->product);
        $this->product->update([
            'stock' => $viewModel->product->getComplectationStock()
        ]);
        Cache::clear();
    }
}
