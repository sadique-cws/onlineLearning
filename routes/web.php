<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[HomeController::class,"index"])->name('homepage');




Route::prefix("admin")->group(function(){

    Route::controller(AdminController::class)->group(function () {
        Route::match(["post","get"],'/login', 'login')->name("admin.login");
        Route::get('/logout', 'logout')->name("admin.logout");
    });

    Route::middleware('admin.auth')->group(function () {
        Route::view("/","admin.home")->name('admin.dashboard');
        Route::resource("courses",CourseController::class);
    });
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
