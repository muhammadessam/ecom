<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCiftCardsTable extends Migration
{
    public function up()
    {
        Schema::table('cift_cards', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_1964600')->references('id')->on('gifts_categories');
        });
    }
}
