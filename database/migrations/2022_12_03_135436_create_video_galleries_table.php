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
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->id('id');
            $table->BigInteger('video_gallery_category_id')->unsigned();
            $table->string('title');
            $table->string('video_url');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
            $table->foreign('video_gallery_category_id')->references('id')->on('video_gallery_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_galleries');
    }
};
