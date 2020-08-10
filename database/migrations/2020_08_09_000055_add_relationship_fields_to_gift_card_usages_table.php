<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGiftCardUsagesTable extends Migration
{
    public function up()
    {
        Schema::table('gift_card_usages', function (Blueprint $table) {
            $table->unsignedInteger('giftcard_id');
            $table->foreign('giftcard_id', 'giftcard_fk_1964640')->references('id')->on('cift_cards');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_1964641')->references('id')->on('customers');
        });
    }
}
