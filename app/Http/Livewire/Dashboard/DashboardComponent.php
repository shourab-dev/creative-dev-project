<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Seminar;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function mount()
    {
        $seminar = Seminar::withCount(['leeds' => function ($q) {
            $q->whereMonth('created_at', Carbon::now()->month);
        }])->withCount(['leeds as oldLeeds_count' => function ($q) {
            $q->whereMonth('created_at', Carbon::now()->subMonth()->month);
        }])->whereMonth('date', Carbon::now()->month)->get();

        // dd(Carbon::now()->subMonth()->month);
        dd($seminar);   
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-component');
    }
}
