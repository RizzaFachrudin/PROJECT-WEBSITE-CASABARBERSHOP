<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run()
    {
        Page::create([
            'PageType' => 'aboutus',
            'PageTitle' => 'About Us',
            'PageDescription' => 'kami adalah Barbershop yang telah berdiri sejak tahun 2004, kami memperhatikan kebersihan dan kenyamanan pelanggan kami. Kami selalu menjaga kebersihan dan sanitasi di setiap area di Barbershop kami dan menggunakan peralatan dan perlengkapan yang steril.Kami berkomitmen untuk memberikan pengalaman yang menyenangkan dan memuaskan bagi pelanggan kami setiap kali mengunjungi Barbershop kami. Jadi, jika Anda mencari tempat untuk potong rambut atau perawatan rambut yang berkualitas dengan harga terjangkau, maka Barbershop kami adalah pilihan yang tepat untuk Anda.'
        ]);

        Page::create([
            'PageType' => 'location',
            'PageTitle' => 'Lokasi Barber',
            'PageDescription' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7086438866036!2d109.3577829748143!3d-7.386510692623162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655966a1f80157%3A0x392ba1770c1f70c9!2sCASA%20BARBERSHOP!5e0!3m2!1sen!2sid!4v1766995020401!5m2!1sen!2sid" width="450" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);
    }
}