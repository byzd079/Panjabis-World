<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Bayezid',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin'),
                'phone' => '081234567890',
                'address' => 'Kuet',
                'photo' => 'bj.jpg',
                'role' => 'admin',
            ]
        ];
        DB::table('users')->insert($users);
    }
}
