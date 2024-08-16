<?php

namespace App\Events;

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
    public $updatedProductArticles;

    /**
     * Создать новый экземпляр события.
     *
     * @param  array  $updatedProductArticles
     * @return void
     */
    public function __construct(array $updatedProductArticles)
    {
        $this->updatedProductArticles = $updatedProductArticles;
    }
}
