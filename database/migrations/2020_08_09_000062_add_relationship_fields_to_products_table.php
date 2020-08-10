<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_1963647')->references('id')->on('product_statuses');
            $table->unsignedInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_1964159')->references('id')->on('vendors');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_1964160')->references('id')->on('brands');
        });
    }
}
