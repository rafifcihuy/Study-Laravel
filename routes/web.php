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
    // $deskripsi = Blog::where('body', 'like', '%$body%')->firstOrFail(); 
    // $deskripsi = Blog::where('body', 'like', '%$body%')->firstOrFail(); 
    $deskripsi = Blog::first();
    $nama = User::first();
    return view('about', compact('judul', 'deskripsi', 'nama'));
});
Route::get('/blog', function () {
    // $blogs = Blog::paginate(21);
    $blogs = Blog::with(['author', 'category'])->paginate(21);
    $users = User::get(); // <- INI Eager Loading
    return view('blog', compact('blogs', 'users'));
});
Route::get('/blog/{slug}', function ($slug) {
    $blogs = Blog::where('slug', $slug)->firstOrFail();
    // $blogs = Blog::with('author')->get(); 
    return view('blog-detail', compact('blogs'));
});
Route::get('/author/{user}', function ($user) {
    $author = User::where('username', $user)->firstOrFail();
    $author->load('blogs.author');   // Lazy Eager Loading, sekalian ambil category tiap blog
    $blogs = $author->blogs;
    return view('blog-author', compact('author', 'blogs'));
});
Route::get('/category/{name}', function ($name) {
    $category = Category::where('name', $name)->firstOrFail();
    $category->load('blogs.author');   // Lazy Eager Loading, sekalian ambil author tiap blog
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
    $email = User::get();
    // $peler = $email->peler;
    return view('contact', compact('contact', 'email'));
});

