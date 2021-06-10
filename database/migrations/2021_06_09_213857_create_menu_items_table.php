<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned()->index();
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('menu_category_id')->unsigned()->index();
            $table->foreign('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade');
            $table->integer('restaurant_id')->unsigned()->index();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo');
            $table->double('price');
            $table->timestamps();
        });
    }

    
}
