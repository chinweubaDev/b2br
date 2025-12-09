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
        Schema::create('cruises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('cruise_line'); // Royal Caribbean, Costa Cruises, Norwegian
            $table->string('ship_name');
            $table->string('route');
            $table->date('departure_date');
            $table->date('return_date');
            $table->integer('duration_nights');
            $table->text('ports_of_call');
            $table->decimal('standard_rate', 10, 2);
            $table->decimal('b2b_rate', 10, 2);
            $table->text('inclusions');
            $table->text('exclusions')->nullable();
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
        Schema::dropIfExists('cruises');
    }
};
