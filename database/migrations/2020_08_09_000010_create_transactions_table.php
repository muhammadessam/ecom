<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('result')->nullable();
            $table->string('postdate')->nullable();
            $table->string('tranid')->nullable();
            $table->string('auth')->nullable();
            $table->string('ref')->nullable();
            $table->string('trackid')->nullable();
            $table->string('udf_1')->nullable();
            $table->string('udf_2')->nullable();
            $table->string('udf_3')->nullable();
            $table->string('udf_4')->nullable();
            $table->string('udf_5')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
