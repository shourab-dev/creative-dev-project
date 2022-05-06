<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::select('id', 'thumbnail', 'title', 'slug', 'status', 'detail')->withCount('features')->get();

        return view('backend.courses.courseIndex', compact('courses'));
    }


    public function status($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course->status == 0) {
            $course->status = true;
        } else {
            $course->status = false;
        }
        $course->save();
        return back();
    }
}
