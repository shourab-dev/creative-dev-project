<?php

namespace App\Http\Livewire\Seminars;

use App\Models\Seminar as ModelsSeminar;
use Livewire\Component;

class Seminar extends Component
{
    protected $listeners = ['successUpdate', 'successSave'];
    public function render()
    {
        return view('livewire.seminars.seminar', ['seminars' => ModelsSeminar::with('leeds')->latest()->get(['id', 'name', 'date','status'])]);
    }
    public function changeStatus($seminar_Id)
    {
        $seminar = ModelsSeminar::find($seminar_Id);
        if ($seminar->status == false) {
            $seminar->status = true;
        } else {
            $seminar->status = false;
        }
        $seminar->save();
        $msg = $seminar->status == 0 ? "De-activated" : "Activated";
        session()->flash('message', "Seminar has been " . $msg);
    }

    // EVENTS
    public function successUpdate()
    {
        session()->flash('message', 'Seminar Updated Successfuly');
    }
    public function successSave()
    {
        session()->flash('message', 'Seminar Added Successfuly');
    }
}
