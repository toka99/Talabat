<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('restaurant_id');
            $table->string('name');
            $table->text('description');
            $table->string('logo');
            $table->string('location');
            $table->integer('working_hours');
            $table->integer('minimum_order');
            $table->integer('delivery_fees');
            $table->integer('vendor_id')->unique();
            $table->string('first_name_vendor');
            $table->string('last_name_vendor');
            $table->string('password_vendor');

            $table->timestamps();
        });
    }

    
}
