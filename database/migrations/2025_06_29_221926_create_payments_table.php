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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('payment_reference')->unique();
            $table->string('service_type'); // hotel, tour, visa, cruise, document
            $table->unsignedBigInteger('service_id'); // ID of the specific service
            $table->string('service_name'); // Name of the service
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('NGN');
            $table->string('payment_method'); // bank_transfer, paystack
            $table->string('payment_status')->default('pending'); // pending, completed, failed, cancelled
            $table->string('transaction_id')->nullable(); // External transaction ID (Paystack)
            $table->text('payment_details')->nullable(); // JSON data for payment details
            $table->text('bank_transfer_details')->nullable(); // Bank account details for transfer
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['user_id', 'payment_status']);
            $table->index(['service_type', 'service_id']);
            $table->index('payment_reference');
            $table->index('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
