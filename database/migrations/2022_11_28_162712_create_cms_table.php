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
        Schema::create('cms', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('slug');
            $table->string('parent');
            $table->string('custom_url')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_tagline')->nullable();
            $table->string('short_description')->nullable();
            $table->text('content')->nullable();
            $table->text('gallery')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->tinyInteger('main_menu')->default(0);
            $table->tinyInteger('top_menu')->default(0);
            $table->tinyInteger('side_menu')->default(0);
            $table->tinyInteger('footer_menu')->default(0);
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms');
    }
};
