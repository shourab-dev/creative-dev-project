<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AboutSeeder;
use App\Models\SuccessDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                DepartmentSeeder::class,
                UserSeeder::class,
                RoleSeeder::class,
                PermissionSeeder::class,
                SuccessDescriptionSeeder::class,
                HeaderSeeder::class,
                PortfolioSeeder::class,
                ContactSeeder::class,
                AboutSeeder::class,
                CustomizeSeeder::class,
            ]
        );
    }
}
