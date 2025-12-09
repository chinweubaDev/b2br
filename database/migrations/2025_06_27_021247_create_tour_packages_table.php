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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('category'); // Urban Adventures, Tropical Escapes, Safari & Wildlife
            $table->string('destination');
            $table->date('travel_start_date');
            $table->date('travel_end_date');
            $table->integer('duration_days');
            $table->decimal('standard_rate', 10, 2);
            $table->decimal('b2b_rate', 10, 2);
            $table->text('inclusions');
            $table->text('exclusions')->nullable();
            $table->text('itinerary')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
