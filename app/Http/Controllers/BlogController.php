<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogIndex()
    {
        $trendBlog = BlogPost::with('categories')->where('status', true)->where('trending', true)->limit(5)->get();
        $blogs = BlogPost::with('categories')->where('status', true)->latest()->limit(6)->get();
        $categoryWiseBlog = BlogCategory::with(['posts' => function ($q) {
            $q->latest()->limit(6);
        }])->where('status', true)->limit(5)->latest()->get();
        return view('frontend.blog', compact('blogs', 'trendBlog', 'categoryWiseBlog'));
    }
    public function blogCreate()
    {
        return view('backend.blog.blogCreate');
    }


    public function categoryView($slug)
    {

        $blogs = [];
        $trendBlog = [];
        $categoryWiseBlog = BlogCategory::with(['posts' => function ($q) {
            $q->latest();
        }])->where('status', true)->where('name', $slug)->latest()->get();
        return view('frontend.blog', compact('blogs', 'trendBlog', 'categoryWiseBlog'));
    }
    public function searchView(Request $request)
    {
        
        $blogs = BlogPost::where('status', true)->where('title', 'LIKE', '%' . $request->search . '%')
            ->paginate(15);
        $trendBlog = [];
        $categoryWiseBlog = [];

        return view('frontend.blog', compact('blogs', 'trendBlog', 'categoryWiseBlog'));
    }



    public function blogView($category, $slug)
    {
        $relatedBLog = BlogPost::with('categories')->whereHas('categories', function ($q) use ($category) {
            $q->where('name', $category);
        })->latest()->select('id', 'title', 'thumbnail', 'slug')->where('slug', '!=', $slug)->where('status', true)->limit(3)->get();
        $blog = BlogPost::with('categories')->where('status', true)->where('slug', $slug)->select('title', 'title', 'detail', 'status', 'created_at', 'img')->first();
        return view('frontend.blogView', compact('blog', 'relatedBLog'));
    }


    public function blogApprove()
    {
        return view('backend.blog.approve');
    }


    public function blogEdit()
    {
        $blogs = BlogPost::with('categories')->select('id', 'thumbnail', 'title', 'short_detail', 'status', 'trending')->where('status', true)->get();
        return view('backend.blog.blogEdit', compact('blogs'));
    }
    public function blogItemEdit($id)
    {
        $blogId = $id;
        return view('backend.blog.blogUpdate', compact('blogId'));
    }

    public function blogDelete($id)
    {
        $blog = BlogPost::with('categories')->find($id)->delete();

        return back();
    }


    public function blogTrending($id)
    {

        $blog = BlogPost::find($id);
        if ($blog->trending == 1) {
            $blog->trending = 0;
        } else {

            $blog->trending  = 1;
        }
        $blog->save();
        return back();
    }
}
