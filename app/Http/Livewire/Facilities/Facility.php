<?php

namespace App\Http\Livewire\Facilities;

use Livewire\Component;

class Facility extends Component
{
    protected  $listeners = ['course-img' => 'setFacilityImage'];
    public $facilityImage;
    public function render()
    {
        return view('livewire.facilities.facility');
    }


    public function setFacilityImage($link)
    {
        $this->facilityImage = $link['link'];
    }
}
