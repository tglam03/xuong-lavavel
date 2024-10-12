<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{

      Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->unsignedBigInteger('classroom_id');
        $table->timestamps();

        // Khóa ngoại
        $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropForeign(['classroom_id']);
    });

    Schema::dropIfExists('students');
}
};
