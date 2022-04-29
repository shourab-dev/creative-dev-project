<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class DepartmentEdit extends ModalComponent
{
    public $dp_name;
    public $dp_id;

    public function mount()
    {
        $department = Department::find($this->dp_id, ['id', 'name']);
        $this->dp_name = $department->name;
    }


    public function departmentUpdate($id)
    {
        $department = Department::find($id);
        $department->name = $this->dp_name;
        $department->save();
        $this->emit('success');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.department-edit');
    }
}
