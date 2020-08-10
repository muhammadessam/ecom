<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('to_be_paid', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
