<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product_kind;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product_kind::class);
            $table->string('title');
            $table->string('article');
            $table->string('short_description');
            $table->text('description');
            $table->string('barcode');
            $table->float('supplier_price');
            $table->float('price');
            $table->float('special_price');
            $table->integer('pieces_per_pack');
            $table->integer('stock');
            $table->integer('minimum_stock');
            $table->integer('sorting');
            $table->text('tn_ved');
            $table->tinyInteger('published');
            $table->float('weight');
            $table->float('width');
            $table->float('height');
            $table->float('length');
            $table->float('package_weight');
            $table->float('package_width');
            $table->float('package_height');
            $table->float('package_length');
            $table->bigInteger('category_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('currency_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
