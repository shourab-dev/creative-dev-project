<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\BlogPost;

class ApproveBlog extends Component
{
    protected $listeners = ['deleteBlog'];
    public $search;

    public function render()
    {
        return view('livewire.blog.approve-blog', ['blogs' => BlogPost::where('title', 'LIKE', '%' . $this->search . '%')->where('status', false)->latest()->get()]);
    }


    public function approveBlog($blogId)
    {
        $blog = BlogPost::find($blogId);
        $blog->status = true;
        $blog->save();
        session()->flash('message', 'Blog has been approved');
    }

    public function deleteBlog($id)
    {
        BlogPost::find($id)->delete();
        session()->flash('message', 'Blog has been Denied');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are You Sure?',
            'text' => "You won't be able to revert the action!",
            'id' => $id,
        ]);
    }
}
