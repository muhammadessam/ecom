<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->decimal('credit', 15, 2);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_mail_verified')->default(0)->nullable();
            $table->boolean('is_phone_verified')->default(0)->nullable();
            $table->boolean('is_newletter_subscription')->default(0)->nullable();
            $table->boolean('is_sms_subscription')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
