<?php

namespace App\Http\Controllers\Role;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class CustomRegisterController extends Controller
{
    public function customRegister()
    {
        $roles = Role::where('name', '!=', 'super admin')->toBase()->get();
        return view('backend.user.Register', compact('roles'));
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if ($request->password != $request->confirm_psk) {
            return back()->withErrors(['confirm_psk' => 'Password did not match']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roleId);
        return back()->with('success', 'User registered successfully');
    }

    public function allUsers()
    {
        if (!Auth::user()->hasRole('super admin')) {
            return redirect()->route('dashboard');
        }
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', '!=', 'super admin');
        })->paginate(20);
        // dd($users);
        $roles = Role::where('name', '!=', 'super admin')->toBase()->get();
        return view('backend.user.allUser', compact('users', 'roles'));
    }

    public function updateRole(Request $request)
    {
        $user = User::find($request->userId);
        $user->syncRoles($request->roleId);
        return back()->with('success', 'Roles Has Been Updated');
    }
}
