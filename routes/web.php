<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\DiscountCourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Role\CustomRegisterController;
use App\Http\Controllers\Role\RoleManagementController;
use App\Http\Livewire\Banner\BannerPart;

// Route::get('/leedsend', function () {
//     Artisan::call('leedmail:send');
// });

// Route::get('/migrate', function () {
//     Artisan::call('migrate:fresh');
//     Artisan::call('db:seed');
// });
// Route::get('/storage', function () {
//     Artisan::call('storage:link');
// });





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
Route::GET('/blog', [BlogController::class, 'blogIndex'])->name('blog');
Route::GET('our-blog/{category}/{slug}', [BlogController::class, 'blogView'])->name('blog.view');
Route::GET('our-blogs/{category}', [BlogController::class, 'categoryView'])->name('blog.category.view');
Route::GET('/search/our-blogs', [BlogController::class, 'searchView'])->name('blog.search.view');
Route::GET('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::GET('/verify-certificate', [FrontendController::class, 'verifyCertificate'])->name('verify-certificate');
Route::POST('/verify-certificate', [FrontendController::class, 'verifiedCertificate'])->name('verified-certificate');

Route::GET('/discount-offer', [FrontendController::class, 'discount'])->name('course.discount');
Route::POST('/discount-offer', [DiscountCourseController::class, 'sendOpt'])->name('otp.send');
Route::GET('/send-otp', [DiscountCourseController::class, 'resendOTP'])->name('otp.resend');
Route::POST('/confirm-otp', [DiscountCourseController::class, 'confirmOTP'])->name('otp.confirm');
Route::POST('/wheel/final/shot', [DiscountCourseController::class, 'successSpin'])->name('wheel.success');

// FRONTEND ROUTES ENDS

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
Route::GET('/lucky-wheel', function () {
    return view('backend.wheel.luckyWheel');
})->name('luckywheel')->middleware(['auth', 'can:counciling']);

// File manager ends


// BANNER 

Route::GET('/banner', function () {
    return view('backend.banner.banners');
})->name('banner')->middleware('auth', 'can:add banner');
Route::GET('/banner/trash', function () {
    return view('backend.banner.bannerTrash');
})->name('banner.trash')->middleware('auth', 'can:trash banner');
Route::view('/banner-part', 'backend.banner.bannerPart')->name('banner.part.update')->middleware('auth', 'can:add banner');
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
    Route::view('home-page-customize', 'backend.customize.homeCustomize')->name('home')->middleware('can:manage header');
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



// ROUTE FOR USER MANAGEMENT
Route::middleware('auth', 'can:user management')->prefix('user/')->name('user.')->group(function () {
    Route::get('register', [CustomRegisterController::class, 'customRegister'])->name('store');
    Route::POST('register', [CustomRegisterController::class, 'saveUser'])->name('new.store');
    Route::GET('/role-management', [RoleManagementController::class, 'index'])->name('role.management');
    Route::GET('/role-management/update/{id}', [RoleManagementController::class, 'editRole'])->name('role.management.update');
    Route::PUT('/role-management/update/{id}', [RoleManagementController::class, 'updateRole'])->name('role.management.updated');
    Route::POST('/role-management', [RoleManagementController::class, 'storeRole'])->name('role.management.store');
    Route::GET('/all', [CustomRegisterController::class, 'allUsers'])->name('all');
    Route::POST('/update', [CustomRegisterController::class, 'updateRole'])->name('update.role');

    // Route::GET('/role-management/permission/{id}', [RoleManagementController::class, 'updatePermission'])->name('permission.update');
});



// ROUTE FOR BLOG CATEGORY
Route::middleware('auth')->name('blog.')->prefix('blog-part/')->group(function () {
    Route::view('/category', 'backend.blog.category')->middleware('can:manage category')->name('category');
    Route::GET('/create', [BlogController::class, 'blogCreate'])->name('create')->middleware('can:add blog');
    Route::GET('/approve', [BlogController::class, 'blogApprove'])->name('approve')->middleware('can:approve blog');
    Route::GET('/edit', [BlogController::class, 'blogEdit'])->name('edit')->middleware('can:edit blog');
    Route::GET('/edit/item/{id}', [BlogController::class, 'blogItemEdit'])->name('edit.item')->middleware('can:edit blog');
    Route::GET('/trending/item/{id}', [BlogController::class, 'blogTrending'])->name('trending.item')->middleware('can:edit blog');
    Route::DELETE('/delete/item/{id}', [BlogController::class, 'blogDelete'])->name('delete.item')->middleware('can:edit blog');
});


// Route::get('/leedsend', function () {
//     Artisan::call('leedmail:send');
// });
