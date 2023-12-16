<?php

use App\Http\Controllers\BasicArticalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\VideosController;
use App\Models\Aboutus;
use App\Models\Carousel;
use App\Models\GetInTouch;
use App\Models\Info;
use App\Models\Service;
use App\Models\TeamMember;
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

Route::get('/', function () {
    return view('index', ['slides' => Carousel::all(), 'getInTouch' => GetInTouch::all()[0], 'info' => Info::all()]);
});
Route::get('/index-ar', function () {
    return view('index-ar', ['slides' => Carousel::all(), 'getInTouch' => GetInTouch::all()[0], 'info' => Info::all()]);
});
// Route::get('/blog-ar', function () {
//     return view('blog-ar',);
// });
// Route::get('/blog', function () {
//     return view('blog');
// });
Route::get('/contact-ar', function () {
    return view('contact-ar', ['getInTouch' => GetInTouch::all()[0]]);
});
Route::get('/contact', function () {
    return view('contact', ['getInTouch' => GetInTouch::all()[0]]);
});

Route::get('/service-ar', function () {
    return view('service-ar', ['getInTouch' => GetInTouch::all()[0], 'service' => Service::all()[0]]);
});
Route::get('/service', function () {
    return view('service', ['getInTouch' => GetInTouch::all()[0], 'service' => Service::all()[0]]);
});
Route::get('/about', function () {
    return view('about', ['aboutUs' => Aboutus::all(), 'getInTouch' => GetInTouch::all()[0], 'members' => TeamMember::all()]);
});
Route::get('/about-ar', function () {
    return view('about-ar', ['aboutUs' => Aboutus::all(), 'getInTouch' => GetInTouch::all()[0], 'members' => TeamMember::all()]);
});

// show books
Route::get('/books', [BookController::class, 'index']);

Route::get('/books-ar', [BookController::class, 'indexAr']);

//make this show all stories from a certain book
Route::get('/books/{id}', [BookController::class, 'show']);

Route::get('/books-ar/{id}', [BookController::class, 'showAr']);

//display books from a certain category
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/category-ar/{id}', [CategoryController::class, 'showAr']);
// list a certain story from a book
Route::get('/story/{id}', [BasicArticalController::class, 'show']);
Route::get('/story-ar/{id}', [BasicArticalController::class, 'showAr']);



// show all normal blogs this one copy pasta
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog-ar', [BlogController::class, 'indexAr']);
// show certain blog
Route::get('/blog/{id}', [BlogController::class, 'show']);
Route::get('/blog-ar/{id}', [BlogController::class, 'showAr']);

Route::get('/blogcategory/{id}', [CategoryController::class, 'showB']);
Route::get('/blogcategory-ar/{id}', [CategoryController::class, 'showBAr']);

// show all Pdf
Route::get('/pdf', [pdfController::class, 'index']);
Route::get('/pdf-ar', [pdfController::class, 'indexAr']);
// show certain pdf
Route::get('/pdf/{id}', [pdfController::class, 'show']);
Route::get('/pdf-ar/{id}', [pdfController::class, 'showAr']);

Route::get('/pdfcategory/{id}', [CategoryController::class, 'showC']);
Route::get('/pdfcategory-ar/{id}', [CategoryController::class, 'showCAr']);

// show all video
Route::get('/vid', [VideosController::class, 'index']);
Route::get('/vid-ar', [VideosController::class, 'indexAr']);
// show certain pdf
Route::get('/vid/{id}', [VideosController::class, 'show']);
Route::get('/vid-ar/{id}', [VideosController::class, 'showAr']);

Route::get('/vidcategory/{id}', [CategoryController::class, 'showD']);
Route::get('/vidcategory-ar/{id}', [CategoryController::class, 'showDAr']);

// show all drawings
Route::get('/art', [DrawingController::class, 'index']);
Route::get('/art-ar', [DrawingController::class, 'indexAr']);
// show certain pdf
Route::get('/art/{id}', [DrawingController::class, 'show']);
Route::get('/art-ar/{id}', [DrawingController::class, 'showAr']);

Route::get('/artcategory/{id}', [CategoryController::class, 'showE']);
Route::get('/artcategory-ar/{id}', [CategoryController::class, 'showEAr']);

Route::get('/writer/{name}', [CategoryController::class, 'writer']);
Route::get('/writer-ar/{name}', [CategoryController::class, 'writerAr']);


Route::fallback(FallbackController::class);
