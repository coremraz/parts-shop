<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_kind extends Model
{
    use HasFactory;
    protected $table = 'product_kinds';
    protected $guarded = [];
    public function props()
    {
        return $this->hasMany(Product_kind_prop::class, 'product_kind_id');
    }

    public function relatedTypes(){
        return $this->hasMany(Related_product_type::class, 'product_kind_id');
    }

    public function compositeElements()
    {

        return $this->hasMany(Product_kind_composite_element::class, 'product_kind_id');
    }
}
