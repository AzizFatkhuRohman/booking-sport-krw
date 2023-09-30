<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminPostOrder;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DetailPostOrder;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserDashboard;
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
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'PostRegister'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'AttempLogin'])->name('login');
// Auth
Route::middleware(['auth'])->group(function(){
    //User Normal Auth
    Route::get('/home',[HomeController::class,'home'])->name('home')->middleware('UserAccess:user');
    Route::get('/user/dashboard',[UserDashboard::class,'ShowDashboard'])->name('dashboard')->middleware('UserAccess:user');
    Route::get('/user/detail-post/{id}',[DetailPostOrder::class,'ShowDetailPost'])->name('detail-post')->middleware('UserAccess:user');
    Route::post('/user/post-komentar',[DetailPostOrder::class,'PostKomentar'])->name('detail-post')->middleware('UserAccess:user');

    //Admin Auth
    Route::get('/admin/dashboard',[AdminDashboard::class,'Dashboard'])->name('dashboard')->middleware('UserAccess:admin');
    Route::get('/admin/post-order',[AdminPostOrder::class,'ShowPostOrder'])->name('post-order')->middleware('UserAccess:admin');
    Route::post('/admin/post-order',[AdminPostOrder::class,'PostPostOrder'])->name('post-order')->middleware('UserAccess:admin');
    Route::get('/admin/post-order/detail/{id}',[AdminPostOrder::class,'PostOrderDetail'])->name('post-order-detail')->middleware('UserAccess:admin');
    Route::put('/admin/post-order/update/{id}',[AdminPostOrder::class,'PostOrderUpdate'])->name('post-order-update')->middleware('UserAccess:admin');
    Route::delete('/admin/post-order/delete/{id}',[AdminPostOrder::class,'PostOrderDelete'])->name('post-order-delete')->middleware('UserAccess:admin');
    
    //Dev Auth
    //Logout Auth
    Route::post('/logout',[AuthController::class,'Logout'])->name('logout');
});
