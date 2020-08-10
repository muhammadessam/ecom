<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lat', 15, 2)->nullable();
            $table->float('long', 15, 2)->nullable();
            $table->longText('details')->nullable();
            $table->string('phone')->nullable();
            $table->string('alter_phone')->nullable();
            $table->string('name')->nullable();
            $table->string('block')->nullable();
            $table->string('gada')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('flat_house')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
