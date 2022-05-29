<?php

namespace Database\Seeders;

use App\Models\HomeCustomize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeCustomizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeCustomize::create([
            'banner_stle' => 'dhaka',
            'facebook_review' => false,
            'seminar_stle' => 'dhaka',
        ]);
    }
}
