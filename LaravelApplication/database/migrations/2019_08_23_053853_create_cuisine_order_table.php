<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuisineOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuisine_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('cost');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('cuisine_id')->references('id')->on('cuisines');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisine_order');
    }
}
