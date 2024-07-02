<?php

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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->decimal('eur_rate', total: 8, places: 2);
            $table->decimal('usd_rate', total: 8, places: 2);
            $table->decimal('gbp_rate', total: 8, places: 2);
            $table->decimal('cny_rate', total: 8, places: 2);
            $table->decimal('try_rate', total: 8, places: 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
