<?php

namespace App\Http\Livewire;

use App\Models\FileManager;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class FileUploadForm extends ModalComponent
{
    use WithFileUploads;
    public $files = [];
    public $iteration = 0;

    public function save()
    {
        $this->validate(
            [
                'files.*' => 'mimes:jpg,jpeg,webp,png', // 1MB Max
            ],
            [
                'files.*.mimes' => 'Support File Type jpg,jpeg,webp,png'
            ]
        );
        foreach ($this->files as $file) {

            $imageName = Str::random(5) . '.' . $file->extension();

            $fileManager = new FileManager();
            $fileManager->name = $imageName;
            $fileManager->link = env('APP_URL') . '/storage/photos/' . $imageName;
            $fileManager->save();
            $file->storeAs('photos', $imageName, 'public');
        }
        $this->files = null;
        $this->iteration++;
        $this->emit('success');
        $this->forceClose()->closeModal();
    }

    public function render()
    {
        return view('livewire.file-upload-form');
    }
}
