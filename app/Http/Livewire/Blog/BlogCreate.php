<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlogCreate extends Component
{
    protected $listeners = [
        'thumbnail' => 'setThumbnail',
        'feature-img' => 'setFeatureImage'
    ];
    public $blogId;

    public $featureImg;
    public $thumbnail;
    public $title;
    public $detail;
    public $keywords;
    public $shortDetail;
    public $categoryId = [];

    public function mount()
    {
        if ($this->blogId) {
            $blog = BlogPost::with('categories')->find($this->blogId);;
            $this->featureImg = $blog->img;
            $this->thumbnail = $blog->thumbnail;
            $this->title = $blog->title;
            $this->detail = $blog->detail;
            $this->keywords = $blog->keywords;
            $this->categoryId = $blog->categories->pluck('id')->toArray();
            $this->shortDetail = $blog->short_detail;
        }
    }

    public function render()
    {
        return view('livewire.blog.blog-create', ['categories' => BlogCategory::toBase()->get()]);
    }


    public function saveBlog()
    {

        $this->validate([
            'title' => 'required',
            'detail' => 'required',
            'categoryId' => 'required',
            'thumbnail' => 'required',
            'featureImg' => 'required',
        ]);
        $slug = str()->slug($this->title);
        if (BlogPost::where('slug', $slug)->exists()) {
            $slug = str()->slug($this->title) . uniqid();
        }
        if ($this->blogId) {
            $blog =  BlogPost::find($this->blogId);
        } else {

            $blog = new BlogPost();
        }

        $user =  User::whereHas('roles', function ($q) {
            $q->whereHas('permissions', function ($query) {
                $query->where('name', 'manage seminar');
            });
        })->find(
            Auth::user()->id,
            ['id']
        );


        if ($user != null) {
            $blog->status = true;
        }
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
        if ($this->blogId) {
            session()->flash('message', 'Blog Successfully Updated');
        } else {

            session()->flash('message', 'Blog Successfully Added');
        }
        return redirect()->route('blog.edit');
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
