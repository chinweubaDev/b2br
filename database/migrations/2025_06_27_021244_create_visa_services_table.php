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
        Schema::create('visa_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->string('visa_type'); // tourist, business, student, etc.
            $table->text('requirements');
            $table->text('processing_time');
            $table->decimal('standard_rate', 10, 2);
            $table->decimal('b2b_rate', 10, 2);
            $table->text('cost_includes')->nullable();
            $table->text('additional_notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_services');
    }
};
