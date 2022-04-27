<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use App\Models\Banner as BannerModel;

class BannerForm extends ModalComponent
{
    use WithFileUploads;
    public $bannerTitle;
    public $bannerDetail;
    public $bannerButton;
    public $bannerLink;
    public $bannerImage;


    public function store()
    {
        $this->validate([
            'bannerImage' => 'required|mimes:png,jpg,webp,jpeg,svg'
        ]);
        // banner Name
        $imageName =  uniqid() . '.' . $this->bannerImage->extension();
        $imageLink = env('APP_URL') . '/storage/banners/' . $imageName;

        $banner = new BannerModel();
        $banner->title = $this->bannerTitle;
        $banner->detail = $this->bannerDetail;
        $banner->button = $this->bannerButton;
        $banner->link = $this->bannerLink;
        $banner->image = $imageLink;
        $banner->added_by = Auth::user()->name;
        $banner->save();
        $this->bannerImage->storeAs('banners', $imageName, 'public');
        $this->reset('bannerTitle');
        $this->reset('bannerDetail');
        $this->reset('bannerButton');
        $this->reset('bannerLink');
        $this->reset('bannerImage');
        $this->emit('BannerSuccess');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.banner-form');
    }
}
