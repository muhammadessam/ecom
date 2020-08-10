<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBrandsTable extends Migration
{
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->unsignedInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_1964100')->references('id')->on('vendors');
        });
    }
}
