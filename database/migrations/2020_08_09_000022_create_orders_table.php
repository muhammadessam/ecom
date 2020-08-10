<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('shipping_frees', 15, 2)->nullable();
            $table->datetime('picked_at')->nullable();
            $table->datetime('delievered_at')->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('to_be_paid', 15, 2)->nullable();
            $table->integer('serial')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
