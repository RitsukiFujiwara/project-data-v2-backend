<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auths')->insert([
            'user_id' => 1,
            'status' => 1,
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);

        DB::table('auths')->insert([
            'user_id' => 2,
            'status' => 1,
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
    }
}
