<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCouponsTable extends Migration
{
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->unsignedInteger('product_cat_id')->nullable();
            $table->foreign('product_cat_id', 'product_cat_fk_1964658')->references('id')->on('product_categories');
        });
    }
}
