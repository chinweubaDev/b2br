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
        Schema::create('documentation_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->text('description');
            $table->decimal('standard_rate', 10, 2);
            $table->decimal('b2b_rate', 10, 2);
            $table->text('requirements')->nullable();
            $table->text('processing_time')->nullable();
            $table->string('category'); // Legal, Travel, Business
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentation_services');
    }
};
