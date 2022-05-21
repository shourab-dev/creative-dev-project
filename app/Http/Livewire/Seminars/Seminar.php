<?php

namespace App\Http\Livewire\Seminars;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Exports\SeminarLeedsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Seminar as ModelsSeminar;

class Seminar extends Component
{
    protected $listeners = ['successUpdate', 'successSave', 'backupLeeds' => 'exportLeeds'];
    public function render()
    {
        return view('livewire.seminars.seminar', ['seminars' => ModelsSeminar::with('leeds')->orderBy('date', 'ASC')->get(['id', 'name', 'date', 'status'])]);
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

    public function exportLeeds($seminarId, $name = 'Leeds')
    {
        return Excel::download(new SeminarLeedsExport($seminarId, $name), $name . ' leeds ' . Carbon::today()->format('d-m-y M') . '.xlsx');
    }

    public function deleteLeeds($seminarId, $name = 'Leeds')
    {
        ModelsSeminar::find($seminarId)->delete();
    }
}
