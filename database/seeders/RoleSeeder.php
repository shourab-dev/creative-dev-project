<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super admin',
            'admin',
            'marketing department',
            'user',
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        $user = User::find(1);
        $user->assignRole('super admin');
    }
}
