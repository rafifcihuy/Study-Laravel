<?php

use App\Http\Controllers\LoginController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login',  [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/', function () {
    return view('index'); 
});
Route::get('/home', function () {
    $judul = 'Home';
    $user = Auth::user();
    return view('home', compact('judul', 'user'));
})->middleware('auth');
Route::get('/about', function () {
    $user = Auth::user();
    $blogs = $user->blogs; // Belajar lagi bansggt
    return view('about', compact('user', 'blogs'));
})->middleware('auth');
Route::get('/blog', function () {
    $blogs = Blog::with(['author', 'category'])->paginate(21);
    $users = User::get(); // <- INI Eager Loading
    return view('blog', compact('blogs', 'users'));
})->middleware('auth');
Route::get('/blog/{slug}', function ($slug) {
    $blogs = Blog::where('slug', $slug)->firstOrFail(); 
    // $blogs = Blog::with('author')->get(); 
    return view('blog-detail', compact('blogs'));
})->middleware('auth');  
Route::get('/author/{user}', function ($user) {
    $author = User::where('username', $user)->firstOrFail();
    $author->load('blogs.author');   // Lazy Eager Loading, sekalian ambil category tiap blog
    $blogs = $author->blogs;
    return view('blog-author', compact('author', 'blogs'));
})->middleware('auth');
Route::get('/category/{name}', function ($name) {
    $category = Category::where('name', $name)->firstOrFail();
    $category->load('blogs.author');   // Lazy Eager Loading, sekalian ambil author tiap blog  (Kenapa ini kok pake blog.author buka blog.category? karena kita mau ambil author tiap blog, bukan category tiap blog)
    $blogs = $category->blogs;                                                              // (terus bedanya sama yg atas itu kan pake blog.author, nah ini pake blog.category, jadi beda, karena kita mau ambil author tiap blog bukan category tiap blog)
    // $category = Category::all();
    return view('blog-category', compact('category', 'blogs'));
})->middleware('auth');
Route::get('/contact', function () {
    $contact = 'Contact';   
    $email = User::get();
    $user = Auth::user();
    return view('contact', compact('contact', 'email', 'user'));
})->middleware('auth');

