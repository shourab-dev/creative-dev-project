<?php

namespace App\Http\Livewire\About;

use App\Models\About;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class AboutEdit extends Component
{
    protected  $listeners = ['course-img' => 'setAboutImage'];

    public $detail;
    public $mission;
    public $vission;
    public $img;

    public function mount()
    {
        $aboutData = About::first();
        $this->detail = $aboutData->detail;
        $this->mission = $aboutData->mission;
        $this->vission = $aboutData->vission;
        $this->img = $aboutData->img;
    }

    public function render()
    {
        return view('livewire.about.about-edit');
    }


    public function update()
    {
        $aboutData = About::first();
        $aboutData->detail = $this->detail;
        $aboutData->mission = $this->mission;
        $aboutData->vission = $this->vission;
        $aboutData->img = $this->img;
        $aboutData->save();
        Cache::forget('aboutCache');
        session()->flash('message', 'About Page Updated');
    }


    public function setAboutImage($link)
    {
        $this->img = $link['link'];
    }
}
