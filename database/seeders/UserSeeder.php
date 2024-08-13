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
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'role' => 'user',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Partner',
                'email' => 'partner@mail.com',
                'role' => 'partner',
                'password' => Hash::make('admin123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
