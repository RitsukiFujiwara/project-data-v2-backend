<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('databases')->insert([
            'status' => 1,
            'name' => 'DB1',
            'icon' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
        DB::table('databases')->insert([
            'status' => 2,
            'name' => "DB2",
            'icon' => Str::random(10),
            'created_at' => now(),
            'created_user' => 'testUser',
            'updated_at' => now(),
            'updated_user' => 'testUser'
        ]);
    }
}
