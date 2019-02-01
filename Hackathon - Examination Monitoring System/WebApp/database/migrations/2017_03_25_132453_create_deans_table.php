<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deans', function (Blueprint $table) {
            $table->increments('DeanId');
            $table->string('DeanName');
            $table->string('InstCode');
            $table->string('DeanAadharNo');
            $table->string('DeanEmail');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('deans');
    }
}
