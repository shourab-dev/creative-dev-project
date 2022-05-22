<?php

namespace Database\Seeders;

use App\Models\Customize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customize::create([
            'promo_modal' => false,
            'preloader' => false,
        ]);
    }
}
