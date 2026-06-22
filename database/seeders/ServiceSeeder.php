<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['ServiceName' => 'Men Hair Cut', 'ServiceDescription' => 'potongan rambut pria', 'Cost' => 20, 'Image' => 'f1e1c9c02ca7a456bc47763d7f16b3b51766994729.jpg'],
            ['ServiceName' => 'Men Hair Color', 'ServiceDescription' => 'Warna rambut pria', 'Cost' => 30, 'Image' => 'ce0d64cf65fb1b419496e6ef6a8885691766994750.jpg'],
            ['ServiceName' => 'Men Hair Perm', 'ServiceDescription' => 'Perm', 'Cost' => 35, 'Image' => '777326b852d734e532b340ce18c6e6281766994821.jpg'],
            ['ServiceName' => 'Men Hair Tattoo', 'ServiceDescription' => 'hahahihi', 'Cost' => 15, 'Image' => '031309075dd169afff0ca6ab3b5c13371766074942.jpg'],
            ['ServiceName' => 'Dreadlock', 'ServiceDescription' => 'Gimbal Yoomann', 'Cost' => 100, 'Image' => '720c6908727f0a2b3b307f3be229f88d1766994898.jpg'],
            ['ServiceName' => 'Hair Cornrow', 'ServiceDescription' => 'huhuh', 'Cost' => 75, 'Image' => '077873d77a26114140cfd070ce9354251766994944.jpg'],
        ];

        foreach ($data as $service) {
            Service::create($service);
        }
    }
}