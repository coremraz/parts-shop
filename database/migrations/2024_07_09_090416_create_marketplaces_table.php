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
        Schema::create('marketplaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('heading');
            $table->text('text');
            $table->string('logo');
            $table->text('anons_text');
            $table->boolean('visible');
            $table->integer('sorting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markerplaces');
    }
};
