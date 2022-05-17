<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SuccessController;

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
});

// MY PORTFOLIO 
Route::view('/portfolio', 'backend.portfolio.portfolio')->middleware('auth')->name('portfolio');
