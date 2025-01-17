<?php

use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// profile

Route::get('/profile/{username}', function ($username) {
    $profile = User::where('username', $username)->first();
    return view('profile', ['user' => $profile]);
})->name('profile.show')->middleware('auth');

// post

Route::get('/post/{id}', function ($id) {
    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
})->name('post.show')->middleware('auth');


Route::get('/create-post', function () {
    return view('create-post');
})->name('create-post')->middleware('auth');


// register
Route::get('(register', function() {
    return view('register');
})->name('register.show')->middleware('guest');

// login
Route::get('/login', function () {

    // redirect if logged in
    return view('login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout.store')->middleware('auth');

Route::get('/logout', function () {
    LoginController::logout();
    return redirect('/login');
})->name('logout');

