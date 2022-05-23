<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Seminar;

use Livewire\Component;
use App\Exports\ContactsExport;
use App\Exports\SeminarLeedsExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardComponent extends Component
{
    public $seminarList;
    public $seminars;
    public $currentContact;
    public function mount()
    {
        $seminar = Seminar::select('id', 'name', 'status')->where('status', true)->withCount(['leeds' => function ($q) {
            $q->whereMonth('created_at', Carbon::now()->month);
        }])->whereMonth('date', Carbon::now()->month)->get();

        $this->seminarList = $seminar;

        // TODAYS SEMINAR'S LEEDS
        $currentSeminar  = Seminar::with('leeds')->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', true)->orderBy('date', 'ASC')->get();
        // dd($currentSeminar);
        if ($currentSeminar != null) {
            $this->seminars = $currentSeminar;
        }

        // CURRENT MONTH ALL CONTACT LEEDS
        $currentLeeds = Contact::whereMonth('created_at', Carbon::now()->month)->latest()->get();

        $this->currentContact = $currentLeeds;


        // dd($currentLeeds);
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-component');
    }



    public function exportLeeds($seminarId, $name = 'Leeds')
    {
        return Excel::download(new SeminarLeedsExport($seminarId, $name), $name . ' leeds ' . Carbon::today()->format('d-m-y M') . '.xlsx');
    }


    public function download()
    {
        return Excel::download(new ContactsExport(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()), "counciling-leeds-" . Carbon::today()->format('d-m-Y M') . ".xlsx");
    }
}
