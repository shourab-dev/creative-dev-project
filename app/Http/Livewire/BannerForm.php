<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FileManager;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Cache;

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
            'bannerImage' => 'required'
        ]);


        $banner = new BannerModel();
        $banner->title = $this->bannerTitle;
        $banner->detail = $this->bannerDetail;
        $banner->button = $this->bannerButton;
        $banner->link = $this->bannerLink;
        $banner->image = $this->bannerImage;
        $banner->added_by = Auth::user()->name;
        $banner->save();
        Cache::forget('bannerCache');
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
        return view('livewire.banner-form', ['files' => FileManager::latest()->tobase()->get()]);
    }
}
