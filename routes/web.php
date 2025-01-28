<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;


use Illuminate\Foundation\Auth\EmailVerificationRequest;




Route::get('/', function () {
    return view('login');
})->name('login');


// Route::get('/appointment', function () {
//     return view('appointment');
// })->name('appointment');  // Name for the appointment route

// Route::get('/article', function () {
//     return view('article');
// })->name('article');  // Name for the articles route

// Route::get('/dairy', function () {
//     return view('dairy');
// })->name('dairy');  // Name for the dairy route

Route::get('mood', [UserController::class, 'moodpage'])->name('mood')->middleware(["auth","verified","ValidUser:user"]);
Route::get('index', [UserController::class, 'indexpage'])->name('index')->middleware(["auth","verified",'ValidUser:user']);
// Route::get('article', [UserController::class, 'articlepage'])->name('article')->middleware(["auth","verified","ValidUser"]);
// Route::resource('articles', ArticleController::class);
// Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
// Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

// Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); // To display all articles

Route::resource('articles', ArticleController::class); // Resourceful routes for CRUD operations

Route::get('/userArticles', [ArticleController::class, 'userIndex'])->name('articles.userIndex'); // For the user-specific view of articles

//.................
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// User Authentication Routes
Route::view('login', 'login')->name('login');
Route::post('loginMatch', [UserController::class, 'login'])->name('loginMatch');
Route::view('register', 'register')->name('register');
Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(["auth","verified","ValidUser:user"])->group(function () {
    Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
    Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store');
});


Route::middleware(["auth","verified","ValidUser:user"])->group(function () {
    Route::get('/mood', [MoodController::class, 'history'])->name('mood');
    Route::post('/mood/store', [MoodController::class, 'store'])->name('mood.store');
});

// Admin Dashboard Routes
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('AdminDashboard')->middleware(["auth", 'ValidUser:admin']);
Route::get('user/{id}/edit', [AdminController::class, 'edit'])->name('user.edit')->middleware(['auth', 'ValidUser:admin']);
Route::put('user/{id}', [AdminController::class, 'update'])->name('user.update')->middleware(['auth', 'ValidUser:admin']);
Route::delete('user/{id}', [AdminController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'ValidUser:admin']);







//email verification

Route::get('/email/verify', function () {
    return view('verifyEmail');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');



//download excel file

Route::get('/admin/export-users', [AdminController::class, 'exportUsers'])->name('export.users');
