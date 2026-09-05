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
    $blogs = Blog::where('slug', $slug)->firstOrFail();
    return view('blog-detail', compact('blogs'));
});
Route::get('/author/{id}', function ($id) {
    $author = User::findOrFail($id);
    $blogs = $author->blogs;
    return view('blog-author', compact('author', 'blogs'));
});
// Bonus: optimasi biar nggak N+1 query (kalau nanti banyak data)
// php
// Route::get('/author/{id}', function ($id) {
//     $author = User::with('blogs')->findOrFail($id);
//     return view('author-blogs', ['author' => $author, 'blogs' => $author->blogs]);
// });
Route::get('/contact', function () {
    return view('contact', ['judul' => 'contact']); 
});

