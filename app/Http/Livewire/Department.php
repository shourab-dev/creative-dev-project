<?php

namespace App\Http\Livewire;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;

class Department extends Component
{

    protected $listeners = ['success'];

    public function success()
    {
        session()->flash('message', 'Department Name Changed successfully');
    }

    public function changeStatus($id)
    {
        $item = ModelsDepartment::find($id);

        if ($item->status == 1) {
            $item->status = 0;
        } else {
            $item->status = 1;
        }
        $item->save();
    }

    public function render()
    {
        return view('livewire.department', ['departments' => ModelsDepartment::latest()->toBase()->get()]);
    }
}
