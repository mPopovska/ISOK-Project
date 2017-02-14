<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabletsreview', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('comment');
            $table->integer('tablet_id')->unsigned();
            $table->foreign('tablet_id')->references('id')->on('tablets');
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
        Schema::dropIfExists('tabletsreview');
    }
}
