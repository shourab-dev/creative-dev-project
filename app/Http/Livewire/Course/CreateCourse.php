<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Feature;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithFileUploads;

class CreateCourse extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'markteplace' => 'setMarketPlace',
        'software' => 'setSoftware',
        'thumbnail' => 'setThumbnail',
        'course-img' => 'setImage',
        'feature-img' => 'setFeatureImage'
    ];
    public $department_id;
    public $title;
    public $slug;
    public $detail;
    public $thumbnail;
    public $image;
    public $iframe;
    public $selectMarketPlace = [];
    public $selectSoftware = [];
    public $basic;
    public $opportunity;
    public $moto;
    public $project;
    public $duration;
    public $demand;
    public $totalClass;
    // features
    public $featureImg;
    public $featureTitle;
    public $featureDetail;


    public function render()
    {
        return view('livewire.course.create-course', ['departments' => Department::latest()->where('status', true)->toBase()->get()]);
    }

    public function saveCourse()
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

        $course = new Course();
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
        $course->moto = $this->moto;
        $course->demand = $this->demand;
        $course->projects = $this->project;
        $course->total_class = $this->totalClass;
        $course->duration = $this->duration;

        $course->save();
        // feature Save
        $feature = new Feature();
        $feature->course_id = $course->id;
        $feature->title = $this->featureTitle;
        $feature->feature_image = $this->featureImg;
        $feature->details = $this->featureDetail;
        $feature->save();
        $this->reset();

        session()->flash('message', 'Course Added successfully. Go to Edit in order to add more Features!');
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

    public function updatedTitle()
    {
        $this->slug = str()->slug($this->title);
    }
}
