<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptopsreview', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('comment');
            $table->integer('laptop_id')->unsigned();
            $table->foreign('laptop_id')->references('id')->on('laptops');
            $table->boolean('approve');
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
        Schema::dropIfExists('laptopsreview');
    }
}
