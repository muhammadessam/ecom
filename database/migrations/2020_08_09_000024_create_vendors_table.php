<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->longText('about')->nullable();
            $table->boolean('is_active')->default(0)->nullable();
            $table->decimal('commision_annual_price', 15, 2)->nullable();
            $table->date('renew_commision_date')->nullable();
            $table->string('commision_type')->nullable();
            $table->boolean('is_knet_supported')->default(0)->nullable();
            $table->boolean('is_cc_supported')->default(0)->nullable();
            $table->decimal('minimum_charge', 15, 2)->nullable();
            $table->string('website')->nullable();
            $table->longText('extra_info')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->time('openning')->nullable();
            $table->time('closing')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
