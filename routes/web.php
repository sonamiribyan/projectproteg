<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\galleryController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admi',function(){
    if(Auth::check()){
        $users=User::all();
        return view('admin.home.index',[
            'users'=>$users
        ]);
    }
    else{
        return view('admin.home.login');
    }
})->name('admin');
Route::get('/admie/login',function(){
    if(Auth::check()){
        return view('admin.home.index');
    }
    else{
        return view('admin.home.login');
    }
});
Route::post('/admin/login',[UserController::class,'loginUser'])->name('user.loginUser');
Route::get('/admin/logout',[UserController::class,'logout'])->name('logout');
Route::post('/admin/create',[UserController::class,'create'])->name('admin.create');
Route::get('/admin/delete',[UserController::class,'delete'])->name('delete.user');
Route::get('/admin/gallery',function(){
    return view('admin.home.gallery');
})->name('gallery');
Route::post('/admin/gallery/create',[galleryController::class,'store'])->name('admin.gallery.create');
