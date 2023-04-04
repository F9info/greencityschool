<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Admin::find(1) == null) {
            DB::table('admins')->insert([
                'id' => 1,
                'name' => 'F9 Admin',
                'email' => 'admin@admin.com',
                'mobile' => '1234567890',
                'password' => '$2y$10$uJ/qjQ.R/EFB3F9kfoMx5uZOlwm4ErEfvnuK5fsLuV5syNXmcsNPC',
                'created_at' => '2022-11-18 12:10:49',
                'updated_at' => '2022-11-18 12:10:49',
            ]);
        }
    }
}