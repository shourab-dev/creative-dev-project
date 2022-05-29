<?php

namespace App\Http\Livewire\Customize;

use Livewire\Component;
use App\Models\HomeCustomize as ModelHomeCustomize;

class HomeCustomize extends Component
{
    public $bannerStyle;
    public $courseStyle;

    public function mount()
    {
        $home = ModelHomeCustomize::first();
        $this->bannerStyle = $home->banner_stle;
    }

    public function render()
    {
        return view('livewire.customize.home-customize');
    }


    public function updatedBannerStyle()
    {
        $home = ModelHomeCustomize::first();
        $home->banner_stle = $this->bannerStyle;
        $home->save();
        session()->flash('message', 'Style has been Updated');
    }
    public function updatedCourseStyle()
    {
        $home = ModelHomeCustomize::first();
        $home->course_stle = $this->courseStyle;
        $home->save();
        session()->flash('message', 'Style has been Updated');
    }
}
