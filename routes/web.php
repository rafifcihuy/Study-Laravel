<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); 
});
Route::get('/home', function () {
    $judul = 'Home';
    $users = User::first();
    $kontol = User::find(2);
    return view('home', compact('judul', 'users', 'kontol'));
});
Route::get('/about', function () {
    $judul = 'About';
    // $deskripsi = Blog::where('body', $body)->firstOrFail();
    // $deskripsi = Blog::where('body', '$body')->firstOrFail()
    // $deskripsi = Blog::where('body', 'like', '%$body%')->firstOrFail(); tes
    // $deskripsi = Blog::where('body', 'like', '%$body%')->firstOrFail(); 
    $deskripsi = Blog::all()->first();
    $nama = User::all()->first();
    return view('about', compact('judul', 'deskripsi', 'nama'));
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
Route::get('/author/{user}', function ($user) {
    $author = User::where('username', $user)->firstOrFail();    
    $blogs = $author->blogs;
    // $nomer = Blog::all();
    return view('blog-author', compact('author', 'blogs'));
});
Route::get('/category/{name}', function ($name) {
    $category = Category::where('name', $name)->firstOrFail();
    $blogs = $category->blogs;
    // $category = Category::all();
    return view('blog-category', compact('category', 'blogs'));
});
// Bonus: optimasi biar nggak N+1 query (kalau nanti banyak data)
// php
// Route::get('/author/{id}', function ($id) {
//     $author = User::with('blogs')->findOrFail($id);
//     return view('author-blogs', ['author' => $author, 'blogs' => $author->blogs]);
// });
Route::get('/contact', function () {
    $contact = 'Contact';
    $email = User::all();
    // $peler = $email->peler;
    return view('contact', compact('contact', 'email'));
});

