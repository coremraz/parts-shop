<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductStockUpdated
{
    use Dispatchable, SerializesModels;

    /**
     * Массив артикулов обновленных товаров.
     *
     * @var array
     */
    public $changedProducts;

    /**
     * Создать новый экземпляр события.
     *
     * @param  array  $updatedProductArticles
     * @return void
     */
    public function __construct(array $changedProducts)
    {
        $this->changedProducts = $changedProducts;
    }
}
