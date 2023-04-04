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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->string('event_name');
            $table->BigInteger('event_category_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('contact_email');
            $table->string('image');
            $table->tinyInteger('members_only')->default(0);
            $table->text('additional_fields');
            $table->tinyInteger('registration_enabled')->default(0); 
            $table->date('reg_start_date');
            $table->date('reg_end_date');
            $table->tinyInteger('is_guest_adult')->default(0);
            $table->double('guest_adult_amount');
            $table->tinyInteger('is_guest_child')->default(0);
            $table->double('guest_child_amount');
            $table->tinyInteger('is_adult')->default(0);
            $table->double('adult_amount');
            $table->tinyInteger('is_child')->default(0);
            $table->double('child_amount');
            $table->text('event_description');
            $table->text('registration_note');
            $table->text('page_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->text('top_line');
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->foreign('event_category_id')->references('id')->on('event_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
};
