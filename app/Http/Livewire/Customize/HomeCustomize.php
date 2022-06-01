<?php

namespace App\Http\Livewire\Customize;

use App\Models\FbReview;
use Livewire\Component;
use App\Models\HomeCustomize as ModelHomeCustomize;

class HomeCustomize extends Component
{
    protected $listeners = ['success'];
    public $bannerStyle;
    public $courseStyle;
    public $seminarStyle;
    public $facebook;

    public function mount()
    {
        $home = ModelHomeCustomize::first();
        $this->bannerStyle = $home->banner_stle;
        $this->courseStyle = $home->course_stle;
        $this->seminarStyle = $home->seminar_stle;
        if ($home->facebook_review == 1) {
            $this->facebook = 'true';
        } else {
            $this->facebook = 'false';
        }
    }

    public function render()
    {
        return view('livewire.customize.home-customize', ['reviews' => FbReview::toBase()->get()]);
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
    public function updatedSeminarStyle()
    {
        $home = ModelHomeCustomize::first();
        $home->seminar_stle = $this->seminarStyle;
        $home->save();
        session()->flash('message', 'Style has been Updated');
    }
    public function updatedFacebook()
    {
        $home = ModelHomeCustomize::first();
        if ($this->facebook == 'true') {

            $home->facebook_review = 1;
        } else {
            $home->facebook_review = 0;
        }
        $home->save();
        session()->flash('message', 'Style has been Updated');
    }

    public function success()
    {
        session()->flash('review', 'Facebook Review Added');
    }


    public function deleteReview($id)
    {
        FbReview::find($id)->delete();
        session()->flash('review', 'Review has been Deleted!');
    }
}
