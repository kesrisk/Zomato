<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartCuisineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_cuisine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuisine_id');
            $table->unsignedBigInteger('cart_id');
            $table->bigInteger('quantity');
            $table->timestamps();

            $table->foreign('cuisine_id')->references('id')->on('cuisines');
            $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_cuisine');
    }
}
