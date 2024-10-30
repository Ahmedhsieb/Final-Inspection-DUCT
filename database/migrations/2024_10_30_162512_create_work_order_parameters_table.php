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
        Schema::create('work_order_parameters', function (Blueprint $table) {
            $table->id();
            $table->boolean('check')->default(false);
            $table->string('remarks')->nullable();
            $table->foreignId('productionID')->constrained('production_orders')->references('id');
            $table->foreignId('inspectionParamID')->constrained('inspection_parameters')->references('id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_parameters');
    }
};
