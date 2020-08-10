<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('gifts_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
