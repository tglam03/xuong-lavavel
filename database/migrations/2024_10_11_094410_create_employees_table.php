<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->unique();
            $table->date('date_of_birth')->nullable();                 // ngày sinh
            $table->dateTime('hire_date')->nullable();                 // ngày thuê kiểu ngày và giờ
            $table->decimal('salary', 10, 2)->nullable();  // lương
            $table->boolean('is_active');
            $table->unsignedBigInteger('department_id')->nullable();   // mã phòng ban
            $table->unsignedBigInteger('manager_id')->nullable();      // mã quản lí
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
