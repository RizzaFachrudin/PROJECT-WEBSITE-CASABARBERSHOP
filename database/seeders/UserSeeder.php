<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Baden Nugraha',
            'number' => 8912345,
            'email' => 'badennugraha4@gmail.com',
            'password' => bcrypt('password123'),
            'verif_code' => 'c984f2af4d9652f88dfb4bc5f705796b',
            'reset_code' => null,
            'is_verified' => 1,
        ]);
    }
}