<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_composition extends Model
{
    use HasFactory;
    protected $table = "order_compositions";
    protected $guarded = [];

    protected $fillable = ['quantity', 'product_id', 'order_id'];

}
