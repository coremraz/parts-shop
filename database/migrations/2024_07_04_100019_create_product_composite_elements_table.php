<?php

use App\Models\Product;
use App\Models\Product_composite_element;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_composite_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product_composite_element::class);
            $table->foreignIdFor(Product::class);
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_composite_elements');
    }
};
