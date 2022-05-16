<?php

namespace Database\Seeders;

use App\Models\Footer;
use App\Models\Header;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Header::create([
            'logo' => 'frontend/image/logo (2).png',
            'phone' => '{"phone":["+880 1847422965", "+880 1847422959"]}',
            'email' => '{"email":["ctg@creativeitinstitute.com"]}',
        ]);


        Footer::create([
            'logo'  => 'frontend/image/logo.webp',
            'moto' => 'CHANGE I GROW I SUCCEED',
            'address' => '9 No, Kapasgola Road (4th Floor), Chawk Bazar, Telpotti More, Chattogram 4203, Bangladesh',
            'copyright' => 'Copyright © 2022 Creative IT Institute Chattogram',
        ]);
    }
}
