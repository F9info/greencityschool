<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Change non-tinyint columns using Doctrine-supported change()
        Schema::table('events', function (Blueprint $table) {
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('contact_email')->nullable()->change();
            $table->date('reg_start_date')->nullable()->change();
            $table->date('reg_end_date')->nullable()->change();
            $table->text('event_description')->nullable()->change();
        });

        // Use raw SQL for tinyint fields to avoid Doctrine's unknown type mapping
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `events` MODIFY `members_only` TINYINT(1) NULL");
            DB::statement("ALTER TABLE `events` MODIFY `registration_enabled` TINYINT(1) NULL");
            DB::statement("ALTER TABLE `events` MODIFY `is_guest_adult` TINYINT(1) NULL");
            DB::statement("ALTER TABLE `events` MODIFY `is_guest_child` TINYINT(1) NULL");
            DB::statement("ALTER TABLE `events` MODIFY `is_adult` TINYINT(1) NULL");
            DB::statement("ALTER TABLE `events` MODIFY `is_child` TINYINT(1) NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Revert non-tinyint columns
        Schema::table('events', function (Blueprint $table) {
            $table->date('start_date')->nullable(false)->change();
            $table->date('end_date')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
            $table->string('contact_email')->nullable(false)->change();
            $table->date('reg_start_date')->nullable(false)->change();
            $table->date('reg_end_date')->nullable(false)->change();
            $table->text('event_description')->nullable(false)->change();
        });

        // Revert tinyint columns using raw SQL and restore defaults to 0
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `events` MODIFY `members_only` TINYINT(1) NOT NULL DEFAULT 0");
            DB::statement("ALTER TABLE `events` MODIFY `registration_enabled` TINYINT(1) NOT NULL DEFAULT 0");
            DB::statement("ALTER TABLE `events` MODIFY `is_guest_adult` TINYINT(1) NOT NULL DEFAULT 0");
            DB::statement("ALTER TABLE `events` MODIFY `is_guest_child` TINYINT(1) NOT NULL DEFAULT 0");
            DB::statement("ALTER TABLE `events` MODIFY `is_adult` TINYINT(1) NOT NULL DEFAULT 0");
            DB::statement("ALTER TABLE `events` MODIFY `is_child` TINYINT(1) NOT NULL DEFAULT 0");
        }
    }
};
