<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dp_names = [
            'web & software',
            'graphics design',
            'digital marketing',
            'office application'
        ];
        foreach ($dp_names as $name) {
            Department::create([
                'name' => $name
            ]);
        }
    }
}
