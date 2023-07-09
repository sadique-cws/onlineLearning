<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProjectController;

require __DIR__ . '/auth.php';


Route::get("/", [HomeController::class, "index"])->name('homepage');
Route::view("/about", "home.about")->name('about');
Route::view("/contact", "home.contact")->name('contact');
Route::get("/achievement", [HomeController::class,"placements"])->name('placements');
Route::get("/courses/{cat_slug?}", [HomeController::class, "allCourse"])->name('courses');



Route::prefix("admin")->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::match(["post", "get"], '/login', 'login')->name("admin.login");
        Route::get('/logout', 'logout')->name("admin.logout");
    });

    Route::middleware('admin.auth')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/manage/project', 'manageProjects')->name("admin.manage.projects");
            Route::get('/manage/student', 'manageStudents')->name("admin.manage.students");
            Route::get("/", "index")->name('admin.dashboard');
        });

        Route::controller(PlacementController::class)->group(function(){
            Route::get('/manage/placement', 'managePlacement')->name("admin.manage.placement");
            Route::delete('/manage/placement/{id}', 'destroy')->name("placement.destroy");
        });
        Route::resource("courses", CourseController::class);
        Route::resource("category", CategoryController::class);
    });
});

Route::get("/course/{cat_slug}/{slug}", [HomeController::class, "viewCourse"])->name('viewCourse');



Route::prefix("student")->group(function(){
    Route::middleware('auth')->group(function () {
        Route::controller(StudentController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
        });
        Route::resource("project",StudentProjectController::class);
    
        Route::post('/payment/status', [PaytmController::class, 'paymentCallback'])->name('status');
        Route::post('/payment/{slug}', [PaytmController::class, 'pay'])->name('make.payment');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/placement', [ProfileController::class, 'updatePlacement'])->name('profile.edit.placement');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/profile/picture', [ProfileController::class,'updatePicture'])->name('profile.picture.update');
    
    });
});