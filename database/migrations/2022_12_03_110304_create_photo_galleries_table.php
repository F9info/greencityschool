<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('photo_gallery_category_id')->unsigned();
            $table->string('title');
            $table->string('image');
            $table->string('image_url');
            $table->string('status');
            $table->timestamps();
            $table->foreign('photo_gallery_category_id')->references('id')->on('photo_gallery_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo_galleries');
    }
};
