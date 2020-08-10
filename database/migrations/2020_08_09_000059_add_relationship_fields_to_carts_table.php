<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_1965267')->references('id')->on('customers');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->foreign('coupon_id', 'coupon_fk_1965268')->references('id')->on('coupons');
        });
    }
}
