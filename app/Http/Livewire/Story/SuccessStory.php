<?php

namespace App\Http\Livewire\Story;

use App\Models\SuccessDescription;
use App\Models\SuccessStory as ModelsSuccessStory;
use Livewire\Component;
use Livewire\WithPagination;

class SuccessStory extends Component
{
    use WithPagination;
    protected $listeners = ['saveSuccessStory' => 'setSaveSession', 'deleteSuccessStory'];

    public $detail;
    public function  mount()
    {
        $description = SuccessDescription::toBase()->first();
        $this->detail = $description->detail;
    }
    public function render()
    {
        return view('livewire.story.success-story', ['stories' => ModelsSuccessStory::latest()->toBase()->simplePaginate(6)]);
    }




    public function updateDescription()
    {
        $detail =  SuccessDescription::first();
        $detail->detail = $this->detail;
        $detail->save();
        session()->flash('message', 'Description Updated');
    }


    public function setSaveSession()
    {
        session()->flash('message', 'Success Story has been saved');
    }

    public function confirmDelete($storyId)
    {
        $this->dispatchBrowserEvent('confirmDelete', [
            'type' => 'warning',
            'title' => 'Are You Sure?',
            'text' => "You won't be able to revert this change!",
            'storyId' => $storyId,
        ]);
    }


    public function deleteSuccessStory($id)
    {
        ModelsSuccessStory::find($id)->delete();
        session()->flash('message', 'Success Story has been Deleted!');
    }
}
