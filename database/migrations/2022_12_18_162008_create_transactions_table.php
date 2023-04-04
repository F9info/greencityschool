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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->string('reference');
            $table->string('transaction_id');
            $table->double('amount');
            $table->date('transaction_date');
            $table->bigInteger('payment_method_id')->unsigned();
            $table->string('payment_status');
            $table->string('bank_name')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('cheque_amount')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->text('admin_comment')->nullable();
            $table->text('user_comment')->nullable();
            $table->timestamps();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
};