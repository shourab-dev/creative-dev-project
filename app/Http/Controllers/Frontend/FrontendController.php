<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', true)->toBase()->get();
        $departments = Department::where('status', true)->get();
        $courses = Course::with(['department' => function ($query) {
            $query->select('id', 'name');
        }])->where('status', true)->get();

        return view('frontend.index', compact('banners', 'departments', 'courses'));
    }
}
