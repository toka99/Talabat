<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('mobile_number');
            $table->bigInteger('land_line')->nullable();
            $table->enum('city', ['Cairo', 'Giza','Alexandria','Luxor','Aswan','Mansoura',
                                  'Faiyum','New Valley','Matruh','Red Sea','South Sinai',
                                  'North Sinai','Suez','Beheira','Helwan','Sharqia','Dakahlia',
                                  'Kafr el-Sheikh','Monufia','Minya','Gharbia','Qena','Asyut',
                                  'Sohag','Ismailia','Qalyubia','Damietta','Port Said','6th of October']);

            $table->string('area');
            $table->string('street_name');
            $table->string('address_title')->nullable();
            $table->enum('building_type', ['Apartment', 'House' ,'Office']); 
            $table->bigInteger('floor')->nullable();
            $table->bigInteger('building_number');
            $table->bigInteger('appartment_office_number')->nullable();
            $table->text('additional_directions')->nullable();
            $table->timestamps();
        });
    }

   
}
