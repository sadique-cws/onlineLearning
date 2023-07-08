<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\StudentController;

require __DIR__ . '/auth.php';


Route::get("/", [HomeController::class, "index"])->name('homepage');
Route::view("/about", "home.about")->name('about');
Route::view("/contact", "home.contact")->name('contact');
Route::get("/courses/{cat_slug?}", [HomeController::class, "allCourse"])->name('courses');

Route::controller(StudentController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});

Route::prefix("admin")->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::match(["post", "get"], '/login', 'login')->name("admin.login");
        Route::get('/logout', 'logout')->name("admin.logout");
    });

    Route::middleware('admin.auth')->group(function () {
        Route::view("/", "admin.home")->name('admin.dashboard');
        Route::resource("courses", CourseController::class);
        Route::resource("category", CategoryController::class);
    });
});

Route::get("/course/{cat_slug}/{slug}", [HomeController::class, "viewCourse"])->name('viewCourse');



Route::middleware('auth')->group(function () {
    Route::post('/payment/status', [PaytmController::class, 'paymentCallback'])->name('status');
    Route::post('/payment/{slug}', [PaytmController::class, 'pay'])->name('make.payment');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class,'updatePicture'])->name('profile.picture.update');

});

