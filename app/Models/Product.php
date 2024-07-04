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

}
