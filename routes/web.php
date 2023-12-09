<?php

use App\Http\Controllers\BasicArticalController;
use App\Http\Controllers\CategoryController;
use App\Models\Aboutus;
use App\Models\Carousel;
use App\Models\GetInTouch;
use App\Models\Info;
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
    return view('index', ['slides' => Carousel::all(),'getInTouch' => GetInTouch::all()[0], 'info' => Info::all()]);
});
Route::get('/index-ar', function () {
    return view('index-ar', ['slides' => Carousel::all(),'getInTouch' => GetInTouch::all()[0], 'info' => Info::all()]);
});
// Route::get('/blog-ar', function () {
//     return view('blog-ar',);
// });
// Route::get('/blog', function () {
//     return view('blog');
// });
Route::get('/contact-ar', function () {
    return view('contact-ar',['getInTouch' => GetInTouch::all()[0]]);
});
Route::get('/contact', function () {
    return view('contact',['getInTouch' => GetInTouch::all()[0]]);
});

Route::get('/service-ar', function () {
    return view('service-ar',['getInTouch' => GetInTouch::all()[0]]);
});
Route::get('/service', function () {
    return view('service',['getInTouch' => GetInTouch::all()[0]]);
});
Route::get('/about', function () {
    return view('about', ['aboutUs' => Aboutus::all(), 'getInTouch' => GetInTouch::all()[0], 'members' => TeamMember::all()]);
});
Route::get('/about-ar', function () {
    return view('about-ar', ['aboutUs' => Aboutus::all(), 'getInTouch' => GetInTouch::all()[0], 'members' => TeamMember::all()]);
});

// list All english Articals
Route::get('/blog', [BasicArticalController::class, 'index']);
// list the specific  Id English Artical
Route::get('/blog/{id}', [BasicArticalController::class, 'show']);
// list all english artical with specific Id
Route::get('/category/{id}', [CategoryController::class, 'show']);

// list All arabic Articals
Route::get('/blog-ar', [BasicArticalController::class, 'indexAr']);
// list the specific  Id arabic Artical
Route::get('/blog-ar/{id}', [BasicArticalController::class, 'showAr']);
// list all arabic articals with specific category Id
Route::get('/category-ar/{id}', [CategoryController::class, 'showAr']);
