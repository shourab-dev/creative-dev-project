<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;
use App\Models\FileManager;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Cache;


class BannerEditForm extends ModalComponent
{
    use WithFileUploads;
    public $banner_id;
    public $bannerImage;
    public $title;
    public $detail;
    public $button;
    public $link;
    public function mount()
    {
        $item = Banner::find($this->banner_id);
        $this->title = $item->title;
        $this->detail = $item->detail;
        $this->button = $item->button;
        $this->link = $item->link;
        $this->bannerImage = $item->image;
    }

    public function updateBanner($id)
    {
        $item = Banner::find($id);
        $item->title = $this->title;
        $item->detail = $this->detail;
        $item->button = $this->button;
        $item->link = $this->link;
        $item->image = $this->bannerImage;
        $item->save();
        Cache::forget('bannerCache');
        $this->emit('BannerSuccess');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.banner-edit-form', ['banner' => Banner::find($this->banner_id), 'files' => FileManager::latest()->toBase()->get()]);
    }
}
