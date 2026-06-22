<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        Invoice::create([
            'Userid' => 42,
            'ServiceId' => 23,
            'BillingId' => 350495011,
        ]);
    }
}