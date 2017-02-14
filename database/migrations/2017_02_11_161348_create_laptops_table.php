<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            $table->string('processor');
            $table->string('memory');
            $table->string('hard_disk');
            $table->string('monitor');
            $table->string('screen_size');
            $table->string('dvd');
            $table->string('graphics');
            $table->boolean('network_card');
            $table->boolean('camera');
            $table->boolean('os');
            $table->string('ports');
            $table->string('battery');
            $table->string('dimensions');
            $table->string('weight');
            $table->string('warranty');
            $table->integer('price');
            $table->string('code');
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
        Schema::dropIfExists('laptops');
    }
}
