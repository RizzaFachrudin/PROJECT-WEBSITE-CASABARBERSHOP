<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            ServiceSeeder::class,
            InvoiceSeeder::class,
            PageSeeder::class,
        ]);
    }
}