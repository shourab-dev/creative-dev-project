<?php

namespace App\Http\Livewire\Course;

use App\Models\FileManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class MarketPlace extends ModalComponent
{
    use WithFileUploads;
    public $marketPlaceImages = [];
    public function render()
    {
        return view('livewire.course.market-place', ['files' => FileManager::latest()->toBase()->get()]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }


    public function passMarketPlaceImages()
    {
        $this->emit('markteplace',  json_encode(['marketPlace' => $this->marketPlaceImages]));
        $this->closeModal();
    }
}
