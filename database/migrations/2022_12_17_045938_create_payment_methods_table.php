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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('id');
            $table->string('payment_method_name');
            $table->string('display_name');
            $table->string('slug');
            $table->string('sandbox_key')->nullable();
            $table->string('sandbox_secret')->nullable();
            $table->string('live_key')->nullable();
            $table->string('live_secret')->nullable();
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
        Schema::drop('payment_methods');
    }
};
