<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeanLocationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dean_location_statuses', function (Blueprint $table) {
            $table->increments('loctionstatusid');
            $table->string('DeanEmail');
            $table->boolean('Status');
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
        Schema::dropIfExists('dean_location_statuses');
    }
}
