<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('adress_id');
            $table->foreign('adress_id', 'adress_fk_1964531')->references('id')->on('addresses');
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_1964532')->references('id')->on('customers');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_1965114')->references('id')->on('order_statuses');
        });
    }
}
