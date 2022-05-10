<?php

namespace Database\Seeders;

use App\Models\SuccessDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuccessDescription::create([
            'detail' => 'Creative IT Institute is the harbor of thousands of successful freelancers in Bangladesh. We have trained and produced more than 35,000 freelancers in different fields so far. Our students are successfully leading different freelancing marketplaces in different job categories such as graphic designing, digital marketing, web design and development, software development, 3D animation, networking, film & media, and so on. The secret of the success of our students is that we not only train them for skill development but also provide them mentorship until they become successful in their careers.',
        ]);
    }
}
