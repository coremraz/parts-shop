<?php

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
        Schema::table('product_kinds', function (Blueprint $table) {
            $table->boolean('composite')->default(0);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('moq_supplier')->nullable();
            $table->boolean('composite_product')->default(0);
            $table->integer('priority')->nullable();
        });
    }

    public function down()
    {
        Schema::table('product_kinds', function (Blueprint $table) {
            $table->dropColumn('composite');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('moq_supplier')->nullable();
            $table->boolean('composite_product')->default(0);
            $table->integer('priority')->nullable();
        });
    }
};
