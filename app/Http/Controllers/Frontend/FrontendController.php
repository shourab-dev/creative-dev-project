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
            $banners = Cache::rememberForever('bannerCache', function () {
                return Banner::where('status', true)->toBase()->get();
            });
        } else {
            $banners = Cache::rememberForever('bannerPartCache', function () {
                return BannerPart::first();
            });
        }
        // banner end
        // department
        if ($homeCustomize->course_stle == 'ctg') {
            $departments = Department::where('status', true)->get();
        } else if ($homeCustomize->course_stle == 'dhaka') {
            $departments = Department::with(['Courses' => function ($q) {
                $q->where('status', true)->select('id', 'title', 'duration', 'thumbnail', 'total_class', 'status', 'department_id', 'slug');
            }])->where('status', true)->get();
        }

        // department end
        // course
        if ($homeCustomize->course_stle == 'ctg') {
            $courses = Course::with(['department' => function ($query) {
                $query->select('id', 'name', 'status')->where('status', true);
            }])->select('id', 'department_id', 'title', 'slug', 'detail', 'thumbnail', 'status')->where('status', true)->get();
        } else {
            $courses = null;
        }

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
        $homeCustomize = HomeCustomize::first();

        $course = Course::with(['features' => function ($q) {
            $q->where('status', true);
        }])->where('slug', $slug)->where('status', true)->first();

        $relatedCourses = Course::where('department_id', $course->department_id)->with(['features' => function ($q) {
            $q->where('status', true);
        }])->where('status', true)->where('slug', '!=', $slug)->limit(3)->get();


        if ($course != null) {
            return view('frontend.courseView', compact('course', 'homeCustomize', 'relatedCourses'));
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


    public function contact()
    {
        return view('frontend.contact');
    }



    public function discount()
    {
        return view('frontend.discount.discountModal');
    }
}
