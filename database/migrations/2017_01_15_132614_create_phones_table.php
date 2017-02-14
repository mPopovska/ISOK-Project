<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->string('screen');
            $table->string('primary_camera');
            $table->string('secondary_camera');
            $table->string('os');
            $table->string('ram');
            $table->string('rom');
            $table->string('cpu');
            $table->boolean('gps');
            $table->boolean('wifi');
            $table->boolean('bluetooth');
            $table->string('battery');
            $table->string('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
