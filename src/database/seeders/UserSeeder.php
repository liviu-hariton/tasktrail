<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = DB::table('users')->insertGetId([
            'username' => 'admin',
            'email' => 'admin@tasktrail.lhdev.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('profiles')->insert([
            'user_id' => $user_id,
            'firstname' => 'Admin',
            'lastname' => 'User',
            'phone' => '0712345678',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
