<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CourseController;

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

Route::get('/', function () {
    return view('welcome');
});

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
})->name('filemanager')->middleware('auth');

// File manager ends


// BANNER 

Route::GET('/banner', function () {
    return view('backend.banner.banners');
})->name('banner')->middleware('auth');
Route::GET('/banner/trash', function () {
    return view('backend.banner.bannerTrash');
})->name('banner.trash')->middleware('auth');

// BANNER ends


// Department
Route::GET('/department', function () {
    return view('backend.department.department');
})->name('department')->middleware('auth');


// Courses

Route::GET('/courses', function () {
    return view('backend.courses.courseCreate');
})->name('courses')->middleware('auth');


Route::GET('/courses/all', [CourseController::class, 'index'])->name('courses.index')->middleware('auth');
Route::GET('/course/status/{slug}', [CourseController::class, 'status'])->name('course.status');
Route::GET('/course/edit/{slug}', [CourseController::class, 'edit'])->name('course.edit');
Route::PUT('/couse/feature/update/{id}', [CourseController::class, 'test'])->name('course.feature.update');

Route::GET('/courses/trash', function () {
    return view('backend.courses.courseCreate');
})->name('courses.trash')->middleware('auth');
