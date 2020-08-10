<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('token')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
