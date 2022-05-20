<?php

namespace App\Http\Livewire\Seminars;

use App\Models\Seminar;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class SeminarForm extends ModalComponent
{
    public $seminarId;
    public $name;
    public $date;
    public $time;
    public function mount()
    {
        if ($this->seminarId) {
            $seminar = Seminar::find($this->seminarId);
            $this->name = $seminar->name;
            $this->date = $seminar->date;
            $this->time = $seminar->time;
        }
    }

    public function saveOrUpdate()
    {
        $this->validate([
            'name' => 'required',
            'date' => 'required|after_or_equal:today',
            'time' => 'required',
        ]);
        if ($this->seminarId) {
            $seminar = Seminar::find($this->seminarId);
        } else {
            $seminar = new Seminar();
        }
        $seminar->name = $this->name;
        $seminar->date = $this->date;
        $seminar->time = $this->time;
        $seminar->save();
        if ($this->seminarId) {
            $this->emit('successUpdate');
        } else {
            $this->emit('successSave');
        }
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.seminars.seminar-form');
    }
}
