<?php

use App\Models\Product;
use App\Models\User;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(User::class);
            $table->string('author');
            $table->text('advantages')->nullable();
            $table->text('limitations')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('rating');
            $table->timestamp('date_added')->useCurrent();
            $table->boolean('public')->nullable()->default(null);
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
