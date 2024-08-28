<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_user')->insert([
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'password' => Hash::make('password456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
