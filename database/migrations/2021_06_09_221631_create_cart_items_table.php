<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned()->index();
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->integer('restaurant_id')->unsigned()->index();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->integer('cart_id')->unsigned()->index();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    
}
