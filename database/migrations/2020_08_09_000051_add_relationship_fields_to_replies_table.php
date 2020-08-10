<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id', 'ticket_fk_1966691')->references('id')->on('tickets');
        });
    }
}
