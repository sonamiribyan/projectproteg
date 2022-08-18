<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkProcessController;
use App\Models\User;
use App\Models\gallery;
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
        $images=gallery::all();
    return view('admin.home.gallery',[
        'images'=>$images
    ]);
})->name('gallery');
Route::post('/admin/gallery/create',[galleryController::class,'store'])->name('admin.gallery.create');
Route::get('/admin/gallery/delete/{id}',[galleryController::class,'delete'])->name('admin.gallery.delete');
Route::get('/admin/team',[TeamController::class,'index'])->name('team');
Route::post('/admin/team/create',[TeamController::class,'store'])->name('admin.team.create');
Route::get('/admin/team/delete/{id}',[TeamController::class,'delete'])->name('admin.team.delete');
Route::get('/admin/team/update/{id}',[TeamController::class,'update'])->name('admin.team.update');
Route::post('/admin/team/update/{id}',[TeamController::class,'storeUpdates'])->name('admin.team.store');
Route::get('/admin/workingProcess',[WorkProcessController::class,'index'])->name('workProcess');
Route::get('/admin/workingProcess/create',[WorkProcessController::class,'create'])->name('workProcess.create');
Route::post('/admin/workingProcess/create',[WorkProcessController::class,'store'])->name('workProcess.store');
Route::get('/admin/workingProcess/update/{id}',[WorkProcessController::class,'update'])->name('workProcess.update');
Route::post('/admin/workingProcess/update/{id}',[WorkProcessController::class,'restore'])->name('workProcess.restore');



