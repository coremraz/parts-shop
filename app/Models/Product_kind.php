<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_kind extends Model
{
    use HasFactory;
    protected $table = 'product_kinds';

    public function props()
    {
        return $this->hasMany(Product_kind_prop::class, 'product_kind_id');
    }
}
