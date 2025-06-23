<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '6c46053-1abc-4a78-8442-d20a19d6fb7b',
                'konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eius autem expedita nisi ipsum necessitatibus? Consequuntur, alias! Quia veritatis facere totam, placeat vitae ducimus ut corporis dicta eum repellat doloribus.',
                'active' => 1

            ]
        ];

        DB::table('abouts')->insert($data);
    }
}
