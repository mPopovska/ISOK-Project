<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsPriceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabletsPrices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('just_device');
            $table->integer('smart_s');
            $table->integer('smart_m');
            $table->integer('smart_l');
            $table->integer('magenta_s');
            $table->integer('magenta_m');
            $table->integer('magenta_l');
            $table->integer('tablet_id')->unsigned();
            $table->foreign('tablet_id')->references('id')->on('tablets');
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
        Schema::dropIfExists('tabletsPrices');
    }
}
