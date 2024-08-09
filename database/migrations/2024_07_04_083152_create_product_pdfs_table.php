<?php

use App\Models\Product_pdf_type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: Product::class);
            $table->string('pdf');
            $table->foreignIdFor(model: Product_pdf_type::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pdfs');
    }
};
