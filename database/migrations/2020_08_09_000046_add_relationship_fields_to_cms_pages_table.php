<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCmsPagesTable extends Migration
{
    public function up()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->unsignedInteger('cat_id')->nullable();
            $table->foreign('cat_id', 'cat_fk_1966976')->references('id')->on('cms_categories');
        });
    }
}
