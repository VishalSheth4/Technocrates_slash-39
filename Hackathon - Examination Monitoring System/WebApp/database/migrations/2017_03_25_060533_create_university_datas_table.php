<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_datas', function (Blueprint $table) {
            $table->increments('data_id');
            $table->string('InstCode',50);
            $table->string('InstPincode');
            $table->bigInteger('MinCapacity');
            $table->bigInteger('NoClasses');
            $table->bigInteger('TotalCapacity');
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
        Schema::dropIfExists('university_datas');
    }
}
