<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name')->nullable();
            $table->string('store_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->string('e_mail')->nullable();
            $table->string('receive_order_email')->nullable();
            $table->integer('telephone')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('close_order')->nullable();
            $table->string('ios_app_link')->nullable();
            $table->string('android_app_link')->nullable();
            $table->string('updateios')->nullable();
            $table->string('updateandroid')->nullable();
            $table->string('iosupdatever')->nullable();
            $table->string('androidupdatever')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('telegram')->nullable();
            $table->string('general_image_path')->nullable();
            $table->string('product_image_path')->nullable();
            $table->string('vendor_image_path')->nullable();
            $table->string('slide_image_path')->nullable();
            $table->string('product_video_path')->nullable();
            $table->string('category_image_path')->nullable();
            $table->time('start_opening_time')->nullable();
            $table->time('close_openning_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
