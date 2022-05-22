<?php

namespace App\Http\Livewire\Facilities;

use Livewire\Component;
use App\Models\Facilities;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Cache;

class EditFacility extends ModalComponent
{
    protected  $listeners = ['course-img' => 'setFeatureImage'];
    public $editImage;
    public $editTitle;
    public $editDetail;
    public $facilityId;
    public function setFeatureImage($link)
    {
        $this->editImage = $link['link'];
    }


    public function mount()
    {
        $facility = Facilities::find($this->facilityId);
        $this->editImage = $facility->image;
        $this->editTitle = $facility->title;
        $this->editDetail = $facility->detail;
    }

    public function render()
    {
        return view('livewire.facilities.edit-facility');
    }

    public function updateFaciity()
    {
        $facility = Facilities::find($this->facilityId);
        $facility->image = $this->editImage;
        $facility->title = $this->editTitle;
        $facility->detail = $this->editDetail;
        $facility->save();
        Cache::forget('facilityCache');

        $this->emit('success');
        $this->closeModal();
    }
}
