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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('city');
            $table->string('country');
            $table->integer('star_rating'); // 4, 5, 7 stars
            $table->string('category'); // Corporate, Luxury, Tropical, Safari, Budget
            $table->text('amenities');
            $table->decimal('standard_rate', 10, 2);
            $table->decimal('b2b_rate', 10, 2);
            $table->string('currency', 3)->default('NGN');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
