<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analog extends Model
{
    use HasFactory;
    protected $table = "analogies";

    public function vendor()
    {
        return $this->belongsTo(Analog_vendor::class, 'analog_vendor_id');
    }
}
