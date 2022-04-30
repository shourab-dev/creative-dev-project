<?php

namespace App\Http\Livewire\Course;

use App\Models\FileManager;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Image extends ModalComponent
{
    public $type;
    public $img;
    public function mount($name)
    {
        $this->type = $name;
    }

    public function setThumbNail()
    {
        $this->emit('thumbnail', ['link' => $this->img]);
        $this->closeModal();
    }

    public function setImage()
    {
        $this->emit('course-img', ['link' => $this->img]);
        $this->closeModal();
    }

    public function setFeatureImage()
    {
        $this->emit('feature-img', ['link' => $this->img]);
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.course.image', ['files' => FileManager::latest()->toBase()->get()]);
    }
}
