<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogIndex()
    {
        $trendBlog = BlogPost::with('categories')->where('status', true)->where('trending', true)->limit(5)->get();
        $blogs = BlogPost::with('categories')->where('status', true)->paginate(10);
        return view('frontend.blog', compact('blogs', 'trendBlog'));
    }
    public function blogCreate()
    {
        return view('backend.blog.blogCreate');
    }



    public function blogView($category, $slug)
    {
        $relatedBLog = BlogPost::with('categories')->whereHas('categories', function ($q) use ($category) {
            $q->where('name', $category);
        })->latest()->select('id', 'title', 'thumbnail', 'slug')->where('status', true)->limit(3)->get();
        $blog = BlogPost::with('categories')->where('status', true)->where('slug', $slug)->select('title', 'title', 'detail', 'status', 'created_at', 'img')->first();
        return view('frontend.blogView', compact('blog', 'relatedBLog'));
    }


    public function blogApprove()
    {
        return view('backend.blog.approve');
    }
}
