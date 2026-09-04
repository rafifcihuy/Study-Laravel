<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); 
});
Route::get('/home', function () {
    return view('home', ['judul' => 'Home']); 
});

Route::get('/about', function () {
    return view('about', ['judul' => 'About']); 
});
Route::get('/blog', function () {
    $blogs = Blog::paginate(21);
    $users = User::all();
    return view('blog', compact('blogs', 'users'));
});
Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug', $slug)->firstOrFail();
    return view('blog-detail', compact('blog'));
});
Route::get('/contact', function () {
    return view('contact', ['judul' => 'contact']); 
});

