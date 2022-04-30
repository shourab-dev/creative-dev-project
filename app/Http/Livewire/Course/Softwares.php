<?php

namespace App\Http\Livewire\Course;

use App\Models\FileManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Softwares extends ModalComponent
{
    use WithFileUploads;
    public $softwareImages = [];

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
    public function render()
    {
        return view('livewire.course.softwares', ['files' => FileManager::latest()->toBase()->get()]);
    }


    public function softwareImages()
    {
        $this->emit('software',  json_encode(['software' => $this->softwareImages]));
        $this->closeModal();
    }
}
