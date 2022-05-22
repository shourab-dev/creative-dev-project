<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Cache;


class Banner extends Component
{
    protected $listeners = ['BannerSuccess', 'deleteBanner'];

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are You Sure?',
            'text' => 'This file will be added in your (Trash)!',
            'id' => $id,
        ]);
    }

    public function deleteBanner($id)
    {
        $banner = BannerModel::find($id)->delete();
        Cache::forget('bannerCache');
        session()->flash('message', 'Banner Deleted Successfully');
    }

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
        Cache::forget('bannerCache');
    }

    public function render()
    {
        return view('livewire.banner', ['banners' => BannerModel::latest()->tobase()->simplePaginate(15)]);
    }
}
