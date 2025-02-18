<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CVController;

// =============================
//       Public Routes
// =============================

// Home Page


Route::get('/switch-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('switch-language');

Route::middleware(['setlocale'])->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('home');
});


// Login Routes (only for guests)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout Route (Manually Clearing Session)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Reviews Submission
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// =============================
//    Admin Routes (Requires Auth)
// =============================
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Reviews Management
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::patch('/reviews/{review}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Skills and Projects Management
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);

    // CV Management
    Route::post('/cv/update', [CVController::class, 'update'])->name('cv.update');
});
