<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductAttributeValuesTable extends Migration
{
    public function up()
    {
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->unsignedInteger('attribute_id');
            $table->foreign('attribute_id', 'attribute_fk_1963667')->references('id')->on('product_attributes');
        });
    }
}
