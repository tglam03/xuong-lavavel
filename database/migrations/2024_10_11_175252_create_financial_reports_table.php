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
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_revenue', 15, 2)->nullable();          // Tổng doanh thu
            $table->decimal('total_expenses', 15, 2)->nullable();          // Tổng chi phí
            $table->decimal('profit_before_tax', 15, 2)->nullable();      // Lợi nhuận trước thuế
            $table->decimal('tax', 15, 2)->nullable();                    // Thuế phải nộp
            $table->decimal('profit_after_tax', 15, 2)->nullable();       // Lợi nhuận sau thuế
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_reports');
    }
};
