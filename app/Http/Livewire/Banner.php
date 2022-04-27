<?php

namespace App\Http\Livewire;

use App\Models\Banner as BannerModel;
use Livewire\Component;


class Banner extends Component
{
    protected $listeners = ['BannerSuccess'];

    public function BannerSuccess()
    {
        session()->flash('message', 'Photo Inserted Successfully');
    }

    public function updateStatus($id)
    {
        $banner = BannerModel::find($id);
        if ($banner->status == false) {
            $banner->status = true;
        } else {
            $banner->status = false;
        }
        $banner->save();
    }

    public function render()
    {
        return view('livewire.banner', ['banners' => BannerModel::latest()->tobase()->simplePaginate(15)]);
    }
}
