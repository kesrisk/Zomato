<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuisineRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuisine_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->integer('cost');
            $table->timestamps();

            $table->foreign('cuisine_id')->references('id')->on('cuisines');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisine_restaurant');
    }
}
