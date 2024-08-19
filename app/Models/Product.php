<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];

    public function kinds()
    {
        return $this->belongsTo(Product_kind::class, 'product_kind_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function analogies()
    {
        return $this->hasMany(Analog::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function composite()
    {
        return $this->hasMany(Product_composite_element::class);
    }

    public function parentComplectation()
    {
        return $this->belongsToMany(
            Product::class, // Модель связанных товаров
            'product_composite_elements', // Таблица связи
            'product_element_id',                // Внешний ключ для текущей модели в таблице связи
            'product_id'         // Внешний ключ для связанной модели в таблице связи
        )->as('elements'); // Добавляем алиас для связи
    }

}
