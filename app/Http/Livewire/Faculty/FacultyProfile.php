<?php

namespace App\Http\Livewire\Faculty;

use App\Models\Department;
use Livewire\Component;
use App\Models\Faculties;
use Illuminate\Support\Facades\Auth;

class FacultyProfile extends Component
{
    protected  $listeners = ['course-img' => 'setFacultyImage', 'markteplace' => 'setMarketPlace'];
    public $status = 'true';
    public $facultyImg;
    public  $name;
    public $designation;
    public $speciality;
    public $education;
    public $marketPlace = [];
    public $departmentsId = [];

    public function mount()
    {
        $faculty = Faculties::with(['department' => function ($q) {
            $q->select('department_id');
        }])->where('auth_id', Auth::user()->id)->first();

        if ($faculty != null) {
            $this->facultyImg =  $faculty->img;
            $this->name =  $faculty->name;
            $this->designation =  $faculty->designation;
            $this->speciality =  str($faculty->speciality)->replace('"', '')->replace('[', '')->replace(']', '');
            $this->education = str($faculty->education)->replace('"', '')->replace('[', '')->replace(']', '');
            $this->marketPlace =  $faculty->marketplace;
            foreach ($faculty->department as $dp) {

                $this->departmentsId[] = $dp->department_id;
            }
        }
    }

    public function updatedStatus()
    {
        $faculty = Faculties::where('auth_id', Auth::user()->id)->first();
        if ($faculty->status == true) {
            $faculty->status = false;
            $this->status = '';
        } else {
            $faculty->status = true;
            $this->status = 'true';
        }
        $faculty->save();
    }

    public function render()
    {
        return view('livewire.faculty.faculty-profile', ['departments' => Department::toBase()->where('status', true)->get()]);
    }

    public function saveFaculty()
    {

        $faculties =   Faculties::updateOrCreate([
            'auth_id' =>  Auth::user()->id,
        ], [
            'auth_id' =>  Auth::user()->id,
            'img' => $this->facultyImg,
            'name' => $this->name,
            'designation' => $this->designation,
            'speciality' => $this->jsonConvert($this->speciality),
            'education' => $this->jsonConvert($this->education),
            'marketplace' => $this->marketPlace,
        ]);
        $faculties->department()->sync($this->departmentsId);
        session()->flash('message', 'Faculty Profiled Saved');
    }

    public function jsonConvert($string)
    {
        $array = str($string)->trim()->explode(',');
        return json_encode($array);
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
