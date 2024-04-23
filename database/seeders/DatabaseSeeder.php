<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nickname' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
            'puntuation' => '5'
        ]);
        DB::table('users')->insert([
            'nickname' => 'Desna',
            'email' => 'desna@admin',
            'password' => bcrypt('admin'),
            'puntuation' => '10'
        ]);
        DB::table('users')->insert([
            'nickname' => 'Jose',
            'email' => 'jose@admin',
            'password' => bcrypt('admin'),
            'puntuation' => '2'
        ]);
    }
}
