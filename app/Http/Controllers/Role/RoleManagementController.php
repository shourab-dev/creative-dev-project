<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    public function updatePermission(Request $request, $id)
    {
        dd($request->all);
    }

    public function index()
    {
        $roles = Role::with('permissions')->where('name', '!=', 'super admin')->get();
        return view('backend.user.manageRole', compact('roles'));
    }
    public function storeRole(Request $request)
    {
        $role = str()->lower($request->role);
        Role::create([
            'name' => $role,
        ]);
        return back()->with('success', 'Role Added');
    }

    public function editRole($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::toBase()->get();
        return view('backend.user.updateRole', compact('role', 'permissions'));
    }
    public function updateRole(Request $request, $id)
    {
        // dd($request->all());
        $role = Role::with('permissions')->find($id);
        $role->name = $request->role;
        $role->permissions()->sync($request->permission);
        Artisan::call('cache:clear');
        return redirect()->route('user.role.management')->with('success', 'Role & Permission has been Updated');
    }
}
