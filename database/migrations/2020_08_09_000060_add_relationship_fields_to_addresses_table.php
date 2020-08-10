<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_1964020')->references('id')->on('customers');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id', 'country_fk_1964021')->references('id')->on('countries');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id', 'city_fk_1964022')->references('id')->on('cities');
            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_1964023')->references('id')->on('areas');
        });
    }
}
