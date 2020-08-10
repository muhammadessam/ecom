<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_1965210')->references('id')->on('orders');
            $table->unsignedInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_1965221')->references('id')->on('payment_methods');
        });
    }
}
