<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Seminar;
use App\Models\Customize;
use App\Models\Faculties;
use App\Models\Department;
use App\Models\Facilities;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Models\SuccessDescription;
use App\Http\Controllers\Controller;
use App\Models\BannerPart;
use App\Models\HomeCustomize;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index()
    {
        // banner
        $homeCustomize = HomeCustomize::first();
        if ($homeCustomize->banner_stle == 'ctg') {
            $banners = Banner::where('status', true)->toBase()->get();
        } else {
            $banners = BannerPart::first();
        }
        // banner end
        // department
        $departments = Department::where('status', true)->get();
        // department end
        // course
        $courses = Course::with(['department' => function ($query) {
            $query->select('id', 'name', 'status')->where('status', true);
        }])->select('id', 'department_id', 'title', 'slug', 'detail', 'thumbnail', 'status')->where('status', true)->get();
        // course end

        // SEMINAR 
        $seminars = Seminar::orderBy('date', 'ASC')->where('status', true)->get();
        // SEMINAR 

        // facilities
        $facilities = Cache::rememberForever('facilityCache', function () {
            return Facilities::limit(9)->select('id', 'image', 'title', 'detail')->toBase()->get();
        });
        // customizer options
        $customize = Customize::toBase()->first(['promo_modal', 'modal_img', 'preloader']);

        // dd($courses);

        return view('frontend.index', compact('banners', 'departments', 'courses', 'seminars', 'facilities', 'customize', 'homeCustomize'));
    }
    public function about()
    {
        $aboutData =  Cache::rememberForever('aboutCache', function () {
            return  About::toBase()->find(1, ['detail', 'mission', 'vission', 'img']);
        });
        // dd($aboutData);
        return view('frontend.about', compact('aboutData'));
    }
    public function successStory()
    {
        $successStories = SuccessStory::toBase()->latest()->get();
        $storyDetail = SuccessDescription::toBase()->first(['detail']);


        return view('frontend.success', compact('successStories', 'storyDetail'));
    }
    public function courseView($slug)
    {
        $course = Course::with(['features' => function ($q) {
            $q->where('status', true);
        }])->where('slug', $slug)->where('status', true)->first();
        // dd($course);
        if ($course != null) {
            return view('frontend.courseView', compact('course'));
        }
    }


    public function faculties()
    {
        $faculties = Faculties::with(['department' => function ($q) {
            $q->select('name', 'status')->where('status', true);
        }])->select('id', 'img', 'name', 'designation', 'speciality', 'education', 'status', 'marketplace')->where('status', true)->paginate(20);
        $departments = Department::select('id', 'name')->where('status', true)->toBase()->get();
        // dd($faculties);
        return view('frontend.faculties', compact('faculties', 'departments'));
    }
}
