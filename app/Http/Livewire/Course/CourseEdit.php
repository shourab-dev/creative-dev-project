<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseEdit extends Component
{

    protected $listeners = [
        'markteplace' => 'setMarketPlace',
        'software' => 'setSoftware',
        'thumbnail' => 'setThumbnail',
        'course-img' => 'setImage',
        'feature-img' => 'setFeatureImage'
    ];

    public $course;
    public $departments;
    public $title;
    public $slug;
    public $department_id;
    public $thumbnail;
    public $iframe;
    public $image;
    public $detail;
    public $selectMarketPlace = [];
    public $selectSoftware = [];
    public $basic;
    public $opportunity;



    public function mount()
    {

        $this->departments = Department::get();
        $this->title = $this->course->title;
        $this->slug = $this->course->slug;
        $this->thumbnail = $this->course->thumbnail;
        $this->image = $this->course->image;
        $this->iframe = $this->course->iframe;
        $this->basic = $this->course->basic;
        $this->detail = $this->course->detail;
        $this->opportunity = $this->course->carrer;
        $this->selectMarketPlace = $this->course->marketplace;
        $this->selectSoftware = $this->course->softwares;
        $this->department_id = $this->course->department_id;
    }


    public function editCourse()
    {
        $this->validate([
            'department_id' => 'required',
            'title' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required',
            'image' => 'required',
            'selectMarketPlace' => 'required',
            'selectSoftware' => 'required',
            'basic' => 'required',
            'opportunity' => 'required',
        ], [
            'department_id.required' => 'Choose a Department'
        ]);

        $course = Course::find($this->course->id);
        $course->department_id = $this->department_id;
        $course->title = $this->title;
        $course->slug = $this->slug;
        $course->detail = $this->detail;
        $course->thumbnail = $this->thumbnail;
        $course->image = $this->image;
        $course->iframe = $this->iframe;
        $course->marketplace = $this->selectMarketPlace;
        $course->softwares = $this->selectSoftware;
        $course->basic = $this->basic;
        $course->carrer = $this->opportunity;
        $course->save();

        session()->flash('message', 'Course Edited successfully.');
    }



    public function updatedTitle()
    {
        $this->slug = str()->slug($this->title);
    }

    public function render()
    {
        return view('livewire.course.course-edit');
    }





    public function setThumbnail($link)
    {
        $this->thumbnail = $link['link'];
    }
    public function setImage($link)
    {
        $this->image = $link['link'];
    }

    public function setFeatureImage($link)
    {
        $this->featureImg = $link['link'];
    }

    public function setMarketPlace($marketPlace)
    {
        $this->selectMarketPlace = $marketPlace;
    }
    public function setSoftware($software)
    {
        $this->selectSoftware = $software;
    }


    
}
