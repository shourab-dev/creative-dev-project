<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class DepartmentForm extends ModalComponent
{
    public $name;
    public function departmentstore()
    {
        Department::create([
            'name' => $this->name,
        ]);

        $this->emit('success');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.department-form');
    }
}
