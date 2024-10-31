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
        Schema::create('production_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('production_order');
            $table->string('work_order');
            $table->date('date');
            $table->string('project');
            $table->string('shape');
            $table->string('customer');
            $table->string('quality_inspector');
            $table->string('approved_by')->nullable();
            $table->text('parameters')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_orders');
    }
};
