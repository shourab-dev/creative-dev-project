<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user management',
            'file management',
            'add file',
            'remove file',
            'add banner',
            'edit banner',
            'delete banner',
            'trash banner',
            'department management',
            'add course',
            'edit course',
            'add story',
            'manage story',
            'manage header',
            'manage footer',
            'manage social',
            'manage facilities',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
        $superAdmin = Role::where('name', 'super admin')->first();
        $superAdmin->syncPermissions($permissions);
    }
}
