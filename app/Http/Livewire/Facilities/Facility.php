<?php

namespace App\Http\Livewire\Facilities;

use App\Models\Facilities;
use Livewire\Component;

class Facility extends Component
{
    protected  $listeners = ['course-img' => 'setFacilityImage', 'success' => 'setSuccessMessage'];
    public $facilityImage;
    public $facilityTitle;
    public $facilityDetail;
    public function render()
    {
        return view('livewire.facilities.facility', ['facilities' => Facilities::toBase()->get()]);
    }


    public function setFacilityImage($link)
    {
        $this->facilityImage = $link['link'];
    }

    public function saveFacility()
    {
        $newFacility = new Facilities();
        $newFacility->image = $this->facilityImage;
        $newFacility->title = $this->facilityTitle;
        $newFacility->detail = $this->facilityDetail;
        $newFacility->save();
        $this->reset();
        session()->flash('message', 'New Facility Has Been Added');
    }

    public function deleteFacility($id)
    {
        Facilities::find($id)->delete();
        session()->flash('message', "Facility Item has been Deleted");
    }


    public function setSuccessMessage()
    {
        session()->flash('message', 'Facility Item Has been updated successfully');
    }
}
