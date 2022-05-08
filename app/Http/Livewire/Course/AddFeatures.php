<?php

namespace App\Http\Livewire\Course;

use App\Models\Feature;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddFeatures extends ModalComponent
{
    protected $listeners = [
        'feature-img' => 'setFeatureImage'
    ];

    public $courseId;
    public $feature_title;
    public $feature_img;
    public $featureDetail;

    public function render()
    {
        return view('livewire.course.add-features');
    }


    public function saveFeatureItem()
    {
        $feature = new Feature();
        $feature->course_id = $this->courseId;
        $feature->feature_image = $this->feature_img;
        $feature->title = $this->feature_title;
        $feature->details = $this->featureDetail;
        $feature->save();
        $this->emit('successFeature');

        $this->closeModal();
    }

    public function setFeatureImage($link)
    {
        $this->feature_img = $link['link'];
    }
}
