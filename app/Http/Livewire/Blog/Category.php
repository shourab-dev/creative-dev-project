<?php

namespace App\Http\Livewire\Blog;

use App\Models\BlogCategory;
use Livewire\Component;

class Category extends Component
{
    protected $listeners = ['success', 'deleteCategory'];

    public function success()
    {
        session()->flash('message', 'Task successfully Completed');
    }

    public function changeStatus($id)
    {
        $item = BlogCategory::find($id);

        if ($item->status == 1) {
            $item->status = 0;
        } else {
            $item->status = 1;
        }
        $item->save();
    }

    public function confirmDelete($categoryId)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are You Sure?',
            'text' => "You won't able to retrive it later.",
            'categoryId' => $categoryId,
        ]);
    }
    public function deleteCategory($categoryId)
    {

        BlogCategory::find($categoryId)->delete();
        $this->emit('success');
    }
    public function render()
    {
        return view('livewire.blog.category', ['departments' => BlogCategory::latest()->toBase()->get()]);
    }
}
