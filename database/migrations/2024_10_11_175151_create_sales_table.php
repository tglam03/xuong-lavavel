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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();  // Khóa ngoại liên kết với bảng products
            $table->integer('quantity');                     // Số lượng bán
            $table->decimal('total_price', 15, 2);           // Tổng tiền sau thuế
            $table->decimal('tax', 5, 2);                    // Thuế VAT
            $table->timestamps();                            // Ngày bán hàng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
