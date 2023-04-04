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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('zipcode');
            $table->integer('adult_count')->nullable();
            $table->integer('child_count')->nullable();
            $table->integer('guest_adult_count')->nullable();
            $table->integer('guest_child_count')->nullable();
            $table->double('total_amount')->nullable();
            $table->text('additional_fields');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_registrations');
    }
};
