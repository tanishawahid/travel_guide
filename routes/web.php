<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\AccountController;

// Admin Controllers
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\BookingRequestController;
use App\Http\Controllers\Admin\BannerController;


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

// Route::get('/', 'Website\WebsiteController@index')->name('home');
// Website Routes
Route::get('/',[WebsiteController::class, 'index'])->name('home');
Route::get('/package/{id}', [WebsiteController::class, 'showPackage'])->name('package.show');
Route::post('/confirm-book', [WebsiteController::class, 'confirmBook'])->name('confirmbooking');
Route::get('/about-us',[WebsiteController::class, 'about'])->name('about');
Route::get('/services',[WebsiteController::class, 'services'])->name('services');
Route::get('/gallery',[WebsiteController::class, 'gallery'])->name('gallery');

Route::get('/blog',[WebsiteController::class, 'blog'])->name('blog');
Route::get('/blog/{id}/read',[WebsiteController::class, 'blogRead'])->name('blog.read');

Route::get('/contact-us',[WebsiteController::class, 'contact'])->name('contact');
Route::post('/message',[WebsiteController::class, 'message'])->name('message');

Route::get('/login',[WebsiteController::class, 'login'])->name('login');
Route::get('/register',[WebsiteController::class, 'register'])->name('register');
Route::get('/reset',[WebsiteController::class, 'reset'])->name('reset');
Route::get('/denied',[WebsiteController::class, 'denied'])->name('denied');

// Auth Routes
Route::post('/register',[AuthController::class, 'registration'])->name('register');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/reset', [AuthController::class, 'resetPass'])->name('reset');

// User Account Routes
Route::group(['prefix'=>'account','as'=>'account.', 'middleware' => ['auth', 'userPermission']], function(){
    Route::get('/dashboard',[AccountController::class, 'dashboard'])->name('dashboard');
});

// Admin Routes
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth', 'adminPermission']], function(){
    Route::get('/dashboard',[MainController::class, 'dashboard'])->name('dashboard');

    Route::resource('package', PackageController::class);
    Route::resource('photo', PhotoController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('team', TeamController::class);

    Route::get('booking-requests', [BookingRequestController::class, 'index'])->name('booking.requests');
    Route::put('booking-approve/{id}', [BookingRequestController::class, 'approve'])->name('booking.approve');
    Route::put('booking-cancel/{id}', [BookingRequestController::class, 'canceled'])->name('booking.cancel');

    Route::get('/banner',[BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner/create',[BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner',[BannerController::class, 'store'])->name('banner.store');
    Route::delete('/banner/{id}',[BannerController::class, 'destroy'])->name('banner.destroy');
});