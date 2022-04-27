<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\FileManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

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
    }

    public function render()
    {
        return view('livewire.banner-edit-form', ['banner' => Banner::find($this->banner_id), 'files' => FileManager::latest()->toBase()->get()]);
    }
}
