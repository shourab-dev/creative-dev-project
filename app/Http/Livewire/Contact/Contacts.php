<?php

namespace App\Http\Livewire\Contact;

use App\Exports\ContactsExport;
use Carbon\Carbon;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Contacts extends Component
{
    use WithPagination;
    public $search;
    public $fromDate;
    public $toDate;
    public function searchable()
    {

        $query =  Contact::query();
        if ($this->search) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')->orWhere('phone', 'LIKE', '%' . $this->search . '%');
        }
        if ($this->fromDate && !$this->toDate) {
            $query->whereBetween('created_at', [$this->fromDate, Carbon::now()]);
        } elseif (!$this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', ['1900-01-01', Carbon::parse($this->toDate)->addDay()]);
        } elseif ($this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', [Carbon::parse($this->fromDate), Carbon::parse($this->toDate)->addDay()]);
        }
        return $query->paginate(20);
    }
    public function render()
    {
        return view('livewire.contact.contacts', ['contacts' => $this->searchable()]);
    }

    public function download()
    {
        return Excel::download(new ContactsExport($this->fromDate, $this->toDate), 'counciling-leeds.xlsx');
    }
}
