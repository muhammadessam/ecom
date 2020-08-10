<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiftCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cift_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->decimal('amount', 15, 2);
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
