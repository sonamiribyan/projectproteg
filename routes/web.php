<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkProcessController;
use App\Models\User;
use App\Models\project;
use App\Http\Controllers\ProjectController;
use App\Models\About;
use App\Models\gallery;
use App\Models\blog;
use App\Models\contact;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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
Route::get('/admin/project',function(){
    $project=project::all();
    return view('admin.home.project',[
        'project'=>$project
    ]);
})->name('project');
Route::post('admin/project/create',[ProjectController::class,'store'])->name('project.store');
Route::get('admin/project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');
Route::get('/admin/project/update/{id}',[ProjectController::class,'update'])->name('project.update');
Route::post('/admin/project/update/{id}',[ProjectController::class,'restore'])->name('project.restore');

Route::get('/admin/blog',function(){
    $blog=blog::all();
    return view('admin.home.blog',[
        'blog'=>$blog
    ]);
})->name('blog');
Route::post('admin/blog/create',[BlogController::class,'store'])->name('blog.store');
Route::get('admin/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
Route::get('admin/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::post('admin/blog/update/{id}',[BlogController::class,'restore'])->name('blog.restore');
Route::get('/admin/about',function(){
    $about=About::all();
    return view('admin.home.about',[
        'about'=>$about
    ]);
})->name('about');
Route::get('admin/about/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::post('admin/about/update/{id}',[AboutController::class,'restore'])->name('about.restore');
Route::get('/admin/contact',function(){
    $contact=contact::all();
    return view('admin.home.contact',[
        'contact'=>$contact
    ]);
})->name('contact');
Route::get('admin/contact/update/{id}',[ContactController::class,'update'])->name('contact.update');
Route::post('admin/contact/update/{id}',[ContactController::class,'restore'])->name('contact.restore');

