<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->longText('description')->nullable();
            $table->string('type')->nullable();
            $table->decimal('value', 15, 2);
            $table->boolean('is_free_shipping')->default(0);
            $table->integer('total_usage')->nullable();
            $table->integer('usage_per_user')->nullable();
            $table->boolean('is_active')->default(0);
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->decimal('minimum_amount', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
