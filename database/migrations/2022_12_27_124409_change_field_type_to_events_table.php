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
        Schema::table('events', function (Blueprint $table) {
            $table->string('slug');
            $table->datetime('start_date')->change();
            $table->datetime('end_date')->change();
            $table->datetime('reg_start_date')->change();
            $table->datetime('reg_end_date')->change();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('zipcode')->nullable()->change();
            $table->text('additional_fields')->nullable()->change();
            $table->double('guest_adult_amount')->nullable()->change();
            $table->double('guest_child_amount')->nullable()->change();
            $table->double('adult_amount')->nullable()->change();
            $table->double('child_amount')->nullable()->change();
            $table->text('registration_note')->nullable()->change();
            $table->text('page_title')->nullable()->change();
            $table->text('meta_description')->nullable()->change();
            $table->text('meta_keywords')->nullable()->change();
            $table->text('top_line')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
