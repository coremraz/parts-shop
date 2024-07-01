<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Related_product_type extends Model
{
    use HasFactory;

    public function related_products()
    {
        return $this->hasMany(Related_product::class);
    }
}
