<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PageController;
use App\http\Controllers\HomeController;
use App\http\Controllers\AboutController;
use App\http\Controllers\ArticleController;
use App\http\Controllers\ProductController;
use App\http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Praktikum 1 
/// Route::get('/', function () {
///     return "Selamat Datang";
/// });
    
/// Route::get('/about', function () {
///     return "Nim : 1941720005, Nama : M. Shiva Matahari Yusda";
/// });

/// Route::get('/articles/{id}', function ($id) {
///     return "Ini adalah artikel ID " .$id;
/// });

/// Route::get('/articles/{}', function ($id) {
///     return "Ini adalah artikel ID " .$id;
/// });

// Praktikum 2 
Route::get('/', [HomeController::class,'index']);
Route::get('/about', [AboutController::class,'about']);
Route::get('/articles/{id}', [ArticleController::class,'articles']);

// Praktikum 3 
/// 1. Menampilkan halaman awal website 
    Route::get('/', function(){
        return redirect('https://www.educastudio.com/');
    });

/// 2. Menampilkan daftar product (Route Prefix)
    Route::prefix('/category')->group(function () {
        Route::get('/marbel-edu-games', [ProductController::class,'marbeledugames']);
        Route::get('/marbel-and-friends-kids-games', [ProductController::class,'marbelnfriendskidsgames']);
        Route::get('/riri-story-books', [ProductController::class,'riristorybooks']);
        Route::get('/kolak-kids-songs', [ProductController::class,'kolakkidssongs']);
    });

/// 3. Halaman news (Route Param)
    Route::get('news', function(){
        return redirect('https://www.educastudio.com/news');
    });

    Route::get('news/{title}', function($title){
        return redirect('https://www.educastudio.com/news/' .$title);
    });

/// 4. Menampilkan halaman program (Route Prefix)
    Route::prefix('/program')->group(function () {
        Route::get('/karir', function(){
            return redirect('https://www.educastudio.com/program/karir');
        });
        Route::get('/magang', function(){
            return redirect('https://www.educastudio.com/program/magang');
        });
        Route::get('/kunjungan-industri', function(){
            return redirect('https://www.educastudio.com/program/kunjungan-industri');
        });
    });

/// 5. Menampilkan halaman About Us (Route Biasa)
    Route::get('/abouteduca', function(){
        return redirect('https://www.educastudio.com/about-us');
    });

/// 6. Halaman Contact US (Route Resource Only)
    Route::resource('/contact-us', ContactController::class, 
    [
        'only' => ['index', 'create', 'store']
    ]);