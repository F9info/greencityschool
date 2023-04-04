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
        Schema::create('communication_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('facebook')->default(0);
            $table->tinyInteger('twitter')->default(0);
            $table->tinyInteger('instagram')->default(0);
            $table->tinyInteger('whatsapp')->default(0);
            $table->tinyInteger('email')->default(0);
            $table->tinyInteger('terms_and_conditions')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('communication_details');
    }
};
