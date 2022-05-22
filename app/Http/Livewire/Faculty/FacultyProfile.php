<?php

namespace App\Http\Livewire\Faculty;

use Livewire\Component;
use App\Models\Faculties;
use Illuminate\Support\Facades\Auth;

class FacultyProfile extends Component
{
    protected  $listeners = ['course-img' => 'setFacultyImage', 'markteplace' => 'setMarketPlace'];

    public $facultyImg;
    public  $name;
    public $designation;
    public $speciality;
    public $education;
    public $marketPlace = [];

    public function mount()
    {
        $faculty = Faculties::where('auth_id', Auth::user()->id)->first();

        if ($faculty != null) {
            $this->facultyImg =  $faculty->img;
            $this->name =  $faculty->name;
            $this->designation =  $faculty->designation;
            $this->speciality =  $faculty->speciality;
            $this->education =  $faculty->education;
            $this->marketPlace =  $faculty->marketplace;
        }
    }

    public function render()
    {
        return view('livewire.faculty.faculty-profile');
    }

    public function saveFaculty()
    {
        Faculties::updateOrCreate([
            'auth_id' =>  Auth::user()->id,
        ], [
            'auth_id' =>  Auth::user()->id,
            'img' => $this->facultyImg,
            'name' => $this->name,
            'designation' => $this->designation,
            'speciality' => $this->speciality,
            'education' => $this->education,
            'marketplace' => $this->marketPlace,
        ]);
        session()->flash('message', 'Faculty Profiled Saved');
    }

    public function setFacultyImage($link)
    {
        $this->facultyImg = $link['link'];
    }
    public function setMarketPlace($marketPlace)
    {
        $this->marketPlace = $marketPlace;
    }
}
