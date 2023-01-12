<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frameworks')->insert([
            'status' => 1,
            'program_id' => 1,
            'name' => 'FW1',
            'icon' => Str::random(10),
            'version' => "2.x",
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
        DB::table('frameworks')->insert([
            'status' => 2,
            'program_id' => 2,
            'name' => 'FW2',
            'icon' => Str::random(10),
            'version' => "3.x",
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
    }
}
