<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_allocations', function (Blueprint $table) {
            $table->increments('SAllocateId');
            $table->string('ExamCode');
            $table->string('SeatNo',50);
            $table->string('InstCode');
            $table->timestamps('Asia/Kolkata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_allocations');
    }
}
