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
        Schema::create('product_kinds_props', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sorting');
            $table->boolean('section')->default(0);
            $table->foreignIdFor(Product_kind::class);
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
