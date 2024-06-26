<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function kinds()
    {
        return $this->hasMany(Product_kind::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

}
