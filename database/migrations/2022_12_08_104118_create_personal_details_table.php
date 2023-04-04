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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('wedding_anniversary')->nullable();
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('zipcode');
            $table->string('native_state');
            $table->string('native_district');
            $table->string('native_city');
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_last_name')->nullable();
            $table->string('spouse_gender')->nullable();
            $table->date('spouse_date_of_birth')->nullable();
            $table->string('spouse_native_state')->nullable();
            $table->string('spouse_native_district')->nullable();
            $table->string('spouse_native_city')->nullable();
            $table->text('member_interests')->nullable();
            $table->text('spouse_interests')->nullable();
            $table->text('child_interests')->nullable();
            $table->bigInteger('membership_type_id')->unsigned();
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('membership_type_id')->references('id')->on('membership_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personal_details');
    }
};
