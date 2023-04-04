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
        Schema::create('committee_categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->bigInteger('committee_category_type_id')->unsigned();
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->foreign('committee_category_type_id')->references('id')->on('committee_category_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('committee_categories');
    }
};
