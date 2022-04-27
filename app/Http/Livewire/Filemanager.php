<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\FileManager as ModelsFileManager;

class Filemanager extends Component
{
    protected $listeners = ['success'];

    public $images = [];

    public function success()
    {
        session()->flash('message', 'Photo Inserted Successfully');
    }


    public function Delete()
    {
        $images = $this->images;
        foreach ($images as $image) {

            $selectedImg =  ModelsFileManager::find($image);
            // dump($selectedImg->name);
            $path = public_path('storage/photos/' . $selectedImg->name);
            if (File::exists($path)) {
                unlink($path);
            }
            $selectedImg->delete();
        }

        $this->reset('images');
        session()->flash('message', "Files successfully Delted!");
    }


    public function render()
    {
        return view('livewire.filemanager', ['files' => ModelsFileManager::latest()->toBase()->paginate(30)]);
    }
}
