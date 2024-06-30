<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_kind_prop extends Model
{
    use HasFactory;
    protected $table = 'product_kinds_props';

    public function values()
    {
        return $this->hasMany(Property::class, 'product_kind_prop_id');
    }
}
