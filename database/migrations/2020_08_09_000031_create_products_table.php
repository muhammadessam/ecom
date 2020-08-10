<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('sku')->nullable()->unique();
            $table->string('model')->nullable();
            $table->string('slug')->nullable();
            $table->decimal('price_after_discount', 15, 2)->nullable();
            $table->decimal('cost', 15, 2)->nullable();
            $table->boolean('discountable')->default(0)->nullable();
            $table->string('inventory_number')->nullable();
            $table->boolean('availability')->default(0)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
