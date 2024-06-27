<?php

use App\Models\Product_kind;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('related_product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sorting');
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
