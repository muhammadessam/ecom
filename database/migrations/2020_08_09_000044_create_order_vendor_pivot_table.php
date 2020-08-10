<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('order_vendor', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_1965115')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedInteger('vendor_id');
            $table->foreign('vendor_id', 'vendor_id_fk_1965115')->references('id')->on('vendors')->onDelete('cascade');
        });
    }
}
