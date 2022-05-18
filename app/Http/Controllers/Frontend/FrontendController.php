<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facilities;

class FrontendController extends Controller
{
    public function index()
    {
        // banner
        $banners = Banner::where('status', true)->toBase()->get();
        // banner end
        // department
        $departments = Department::where('status', true)->get();
        // department end
        // course
        $courses = Course::with(['department' => function ($query) {
            $query->select('id', 'name');
        }])->where('status', true)->get();
        // course end
        // facilities
        $facilities = Facilities::limit(9)->select('id', 'image', 'title', 'detail')->toBase()->get();

        // dd($facilities);

        return view('frontend.index', compact('banners', 'departments', 'courses', 'facilities'));
    }
}
