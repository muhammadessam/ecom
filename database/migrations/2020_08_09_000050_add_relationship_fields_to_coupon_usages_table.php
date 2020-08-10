<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCouponUsagesTable extends Migration
{
    public function up()
    {
        Schema::table('coupon_usages', function (Blueprint $table) {
            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id', 'coupon_fk_1966762')->references('id')->on('coupons');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_1966763')->references('id')->on('customers');
            $table->unsignedInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_1966764')->references('id')->on('orders');
        });
    }
}
