<?php

use App\Http\Controllers\backend\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SeminarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::GET('/about', [FrontendController::class, 'about'])->name('about');
Route::GET('/success-stories', [FrontendController::class, 'successStory'])->name('frontend.success.story');
Route::GET('/course/{slug}', [FrontendController::class, 'courseView'])->name('course.view');
Route::GET('/our-faculties', [FrontendController::class, 'faculties'])->name('faculties.view');





// BACKEND ALL ROUTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');
});

// File manager
Route::GET('/file-manager', function () {
    return view('backend.file.fileManager');
})->name('filemanager')->middleware(['auth', 'can:file management']);

// File manager ends


// BANNER 

Route::GET('/banner', function () {
    return view('backend.banner.banners');
})->name('banner')->middleware('auth', 'can:add banner');
Route::GET('/banner/trash', function () {
    return view('backend.banner.bannerTrash');
})->name('banner.trash')->middleware('auth', 'can:trash banner');

// BANNER ends


// Department
Route::GET('/department', function () {
    return view('backend.department.department');
})->name('department')->middleware('auth', 'can:department management');


// Courses

Route::GET('/courses', function () {
    return view('backend.courses.courseCreate');
})->name('courses')->middleware('auth', 'can:add course');


Route::GET('/courses/all', [CourseController::class, 'index'])->name('courses.index')->middleware('auth', 'can:edit course');
Route::GET('/course/status/{slug}', [CourseController::class, 'status'])->name('course.status')->middleware('auth', 'can:edit course');
Route::GET('/course/edit/{slug}', [CourseController::class, 'edit'])->name('course.edit')->middleware('auth', 'can:edit course');
Route::PUT('/couse/feature/update/{id}', [CourseController::class, 'test'])->name('course.feature.update')->middleware('auth', 'can:add course');




// SUCCESS STORY
Route::GET('/success-story', [SuccessController::class, 'index'])->name('success.story')->middleware('auth', 'can:add story');


// CUSTOMIZE WEBSITE [HEADER, FOOTER]
Route::prefix('customize/')->middleware('auth')->name('customize.')->group(function () {
    Route::view('header', 'backend.customize.header')->name('header')->middleware('can:manage header');
    Route::view('footer', 'backend.customize.footer')->name('footer')->middleware('can:manage footer');
    Route::view('social', 'backend.customize.social')->name('social')->middleware('can:manage social');
    Route::view('promo-modal', 'backend.customize.modal')->name('modal')->middleware('can:manage header');
});

// MY PORTFOLIO 
Route::view('/portfolio', 'backend.portfolio.portfolio')->middleware('auth')->name('portfolio');

// OUR FACILITIES
Route::view('/facilities', 'backend.facilities.facilities')->middleware('auth', 'can:manage facilities')->name('facilities');

// COUNCILING 
Route::view('/counciling', 'backend.counciling.counciling')->name('counciling')->middleware('auth', 'can:counciling');
Route::POST('/counciling/store', [ContactController::class, 'storeContact'])->name('counciling.save')->middleware('guest');

// SEMINAR & WORKSHOP ROUTE
Route::view('/seminar', 'backend.seminar.seminar')->name('seminar')->middleware('auth', 'can:manage seminar');
// SEMINAR CONTACT SAVE FROM FRONTEND
Route::POST('/seminar/join', [SeminarController::class, 'saveLeeds'])->name('seminar.join')->middleware('guest');

// Route BACKEND ABOUT US
Route::view('/about-edit', 'backend.about.about-edit')->name('about.edit')->middleware('auth', 'can:edit about');

// ROUTE FOR FACULTY
Route::view('/dashboard/faculties', 'backend.faculty.faculty')->name('faculty.manage')->middleware('auth', 'can:manage faculties');
