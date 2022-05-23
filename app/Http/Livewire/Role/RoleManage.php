<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManage extends Component
{
    protected $listeners = ['sucess', 'sucessStatus'];

    public $roles;
    // public $permissions;

    public function mount()
    {
        $roles = Role::with('permissions')->get();
        // $permissions = ;
        $this->roles = $roles;
        // $this->permissions = $permissions;
    }


    public function render()
    {
        return view('livewire.role.role-manage', ['permissions' => Permission::toBase()->get()]);
    }





    public function sucess()
    {
        session()->flash('message', 'Role Added Successfully');
    }
    public function sucessStatus()
    {
        session()->flash('message', 'Role Status Changed Successfully');
    }
    public function changeStatus($RoleId)
    {
        $seminar = Role::find($RoleId);
        if ($seminar->status == false) {
            $seminar->status = true;
        } else {
            $seminar->status = false;
        }
        $seminar->save();
        $msg = $seminar->status == 0 ? "De-activated" : "Activated";
        // session()->flash('message', "Seminar has been " . $msg);
        $this->emit('sucessStatus');
    }
}
