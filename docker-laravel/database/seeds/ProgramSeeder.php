<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'status' => 1,
            'name' => Str::random(10),
            'icon' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
        DB::table('programs')->insert([
            'status' => 2,
            'name' => Str::random(10),
            'icon' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
    }
}
