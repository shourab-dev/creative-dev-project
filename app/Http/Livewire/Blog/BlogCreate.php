<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

class BlogCreate extends Component
{
    protected $listeners = [
        'thumbnail' => 'setThumbnail',
        'feature-img' => 'setFeatureImage'
    ];

    public $featureImg;
    public $thumbnail;
    public $title;
    public $detail;
    public $keywords;
    public $shortDetail;
    public $categoryId = [];
    public function render()
    {
        return view('livewire.blog.blog-create', ['categories' => BlogCategory::toBase()->get()]);
    }


    public function saveBlog()
    {
        $this->validate([
            'title' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required',
            'featureImg' => 'required',
        ]);
        $slug = str()->slug($this->title);
        if (BlogPost::where('slug', $slug)->exists()) {
            $slug = str()->slug($this->title) . uniqid();
        }

        $blog = new BlogPost();
        $blog->title = $this->title;
        $blog->slug = $slug;
        $blog->user_id = Auth::user()->id;
        $blog->detail = $this->detail;
        $blog->thumbnail = $this->thumbnail;
        $blog->img = $this->featureImg;
        $blog->keywords = $this->keywords;
        $blog->short_detail = $this->shortDetail;
        $blog->save();
        $blog->categories()->sync($this->categoryId);
        $this->reset();
        session()->flash('message', 'Blog Successfully added');
    }


    public function setThumbnail($link)
    {
        $this->thumbnail = $link['link'];
    }
    public function setFeatureImage($link)
    {
        $this->featureImg = $link['link'];
    }
}
