<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;

class AddRoles extends ModalComponent
{
    public $name;
    public function render()
    {
        return view('livewire.role.add-roles');
    }
    public function saveRole()
    {
        $this->validate([
            'name' => 'required'
        ]);
        Role::create([
            'name' => str()->lower($this->name),
        ]);
        $this->emit('sucess');
        $this->closeModal();
    }
}
