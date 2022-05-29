<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\BannerPart as ModelBannerPart;

class BannerPart extends Component
{
    public $slogan;
    public $heading;
    public $secondaryHeading;
    public $detail;
    public $iframe;

    public function render()
    {
        return view('livewire.banner.banner-part');
    }


    public function mount()
    {
        $banner = ModelBannerPart::first();
        $this->slogan = $banner->slogan;
        $this->heading = $banner->heading;
        $this->secondaryHeading = $banner->secondary_heading;
        $this->detail = $banner->detail;
        $this->iframe = $banner->iframe;
    }


    public function updateBannerPart()
    {

        $this->validate([
            'slogan' => 'required',
            'heading' => 'required',
            'secondaryHeading' => 'required',
            'detail' => 'required',
            'iframe' => 'required',
        ]);
        $banner = ModelBannerPart::first();
        $banner->slogan = $this->slogan;
        $banner->heading = $this->heading;
        $banner->secondary_heading = $this->secondaryHeading;
        $banner->detail = $this->detail;
        $banner->iframe = $this->iframe;
        $banner->save();
        Cache::forget('bannerPartCache');
        session()->flash('message', 'Updated Successfully');
    }
}
