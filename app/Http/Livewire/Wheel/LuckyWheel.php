<?php

namespace App\Http\Livewire\Wheel;

use Carbon\Carbon;
use App\Models\Contact;
use Livewire\Component;
use App\Models\LuckyWheel as WheelModal;
use Livewire\WithPagination;
use App\Exports\LuckyWheelExport;
use Maatwebsite\Excel\Facades\Excel;

class LuckyWheel extends Component
{
    use WithPagination;
    public $search;
    public $fromDate;
    public $toDate;
    public function searchable()
    {

        $query =  WheelModal::query();
        if ($this->search) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')->orWhere('discount', 'LIKE', '%' . $this->search . '%')->orWhere('phone', 'LIKE', '%' . $this->search . '%');
        }
        if ($this->fromDate && !$this->toDate) {
            $query->whereBetween('created_at', [$this->fromDate, Carbon::now()]);
        } elseif (!$this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', ['1900-01-01', Carbon::parse($this->toDate)->addDay()]);
        } elseif ($this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', [Carbon::parse($this->fromDate), Carbon::parse($this->toDate)->addDay()]);
        }
        return $query->latest()->paginate(20);
    }


    public function download()
    {
        return Excel::download(new LuckyWheelExport($this->fromDate, $this->toDate), "LuckyWheel-leeds-" . Carbon::now()->format('d-m-Y M g:ia') . ".xlsx");
    }
    public function render()
    {
        return view('livewire.wheel.lucky-wheel', ['contacts' => $this->searchable()]);
    }
}
