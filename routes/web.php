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

Route::controller(HomeController::class)->group(function () {
    Route::get("/","index")->name('homepage');
    Route::view("/about", "about")->name('about');
    Route::view("/contact", "contact")->name('contact');
    Route::get("/achievement", "placements")->name('placements');
    Route::get("/courses/{cat_slug?}", "allCourse")->name('courses');
    Route::get("/course/{cat_slug}/{slug}", "viewCourse")->name('viewCourse');
});

Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::match(["post", "get"], '/login', 'login')->name("admin.login");
        Route::get('/logout', 'logout')->name("admin.logout");
    });

    Route::middleware('admin.auth')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/manage/projects', 'manageProjects')->name("admin.manage.projects");
            Route::get('/manage/students', 'manageStudents')->name("admin.manage.students");
            Route::get('/manage/payments', 'managePayments')->name("admin.manage.payments");
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




Route::prefix("student")->group(function(){
    Route::middleware('auth')->group(function () {
        Route::controller(StudentController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
        });
        Route::resource("project",StudentProjectController::class);
        Route::controller(PaytmController::class)->group(function () {
            Route::post('/payment/status', 'paymentCallback')->name('status');
            Route::post('/payment/{slug}', 'pay')->name('make.payment');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile/placement', 'updatePlacement')->name('profile.edit.placement');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
            Route::post('/profile/picture','updatePicture')->name('profile.picture.update');
        });


    });
});
