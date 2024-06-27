<?php

use App\Models\Analog_vendor;
use App\Models\Product;
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
        Schema::create('analogies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('article');
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Analog_vendor::class); //analog_vendor_id
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
