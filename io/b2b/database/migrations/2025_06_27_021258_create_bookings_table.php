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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('booking_type'); // visa, tour, hotel, cruise, documentation
            $table->string('reference_number')->unique();
            $table->string('service_name');
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('NGN');
            $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled
            $table->date('travel_date')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('passengers')->default(1);
            $table->text('special_requirements')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
