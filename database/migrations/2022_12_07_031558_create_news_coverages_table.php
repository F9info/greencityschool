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
        Schema::create('news_coverages', function (Blueprint $table) {
            $table->id('id');
            $table->BigInteger('news_coverage_category_id')->unsigned();
            $table->string('title');
            $table->string('news_url');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->foreign('news_coverage_category_id')->references('id')->on('news_coverage_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_coverages');
    }
};
