<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'status' => 1,
            'name' => Str::random(10),
            'name_kana' => Str::random(10),
            'gender' => 1,
            'birthdate' => 20220101,
            'zipcode' => 7730015,
            'address' => Str::random(10),
            'license' => '1, 2',
            'url' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);

        DB::table('users')->insert([
            'status' => 2,
            'name' => Str::random(10),
            'name_kana' => Str::random(10),
            'gender' => 1,
            'birthdate' => 20221201,
            'zipcode' => 7730012,
            'address' => Str::random(10),
            'license' => '3, 4',
            'url' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
    }
}
