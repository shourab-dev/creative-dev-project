<?php

namespace App\Http\Livewire\Story;

use Livewire\Component;
use App\Models\SuccessStory;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Cache;

class SuccessForm extends ModalComponent
{
    public $iframe;
    public $storyId;

    public function render()
    {
        return view('livewire.story.success-form');
    }
    public function mount()
    {
        if ($this->storyId) {
            $story = SuccessStory::find($this->storyId);
            $this->iframe = $story->iframe;
        } else {
            $this->iframe = '';
        }
    }

    public function saveStory()
    {
        $iframeLink = $this->iframe;
        $iframeImg = str()->between($iframeLink,  'embed/', '?autoplay=1');
        if ($this->storyId) {
            $success =  SuccessStory::find($this->storyId);
        } else {
            $success = new SuccessStory();
        }
        $success->iframe = $iframeLink;
        $success->iframe_img = $iframeImg;
        $success->save();
        $this->emit('saveSuccessStory');
        $this->closeModal();
    }
}
