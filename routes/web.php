<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\SiteController;
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


Route::get('/',[SiteController::class,'home'])->name('home');
Route::get('/page/{slug}',[SiteController::class,'page'])->name('page.detail');
Route::get('/contact',[SiteController::class,'contact'])->name('contact');
Route::post('/contact', [SiteController::class,'create'])->name('contact.create');

Route::get('/db',function(){
    return view('db');
});

Route::group(['prefix'=>'admin'],function (){
    Route::get('/',[AdminController::class, 'index'])->name('admin.home');
    Route::group(['prefix'=>'menu'],function (){
        Route::get('/',[MenuController::class, 'index'])->name('menu.index');
        Route::get('/create',[MenuController::class, 'create'])->name('menu.create');
        Route::post('/store',[MenuController::class, 'store'])->name('menu.store');
        Route::get('/edit/{id}',[MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/update/{id}',[MenuController::class, 'update'])->name('menu.update');
        Route::delete('/delete/{id}',[MenuController::class, 'delete'])->name('menu.delete');

    });
    Route::group(['prefix'=>'page'],function (){
        Route::get('/',[PageController::class, 'index'])->name('page.index');
        Route::get('/create',[PageController::class, 'create'])->name('page.create');
        Route::post('/store',[PageController::class, 'store'])->name('page.store');
        Route::get('/edit/{page}',[PageController::class, 'edit'])->name('page.edit');
        Route::put('/update/{id}',[PageController::class, 'update'])->name('page.update');
        Route::delete('/delete/{page}',[PageController::class, 'destroy'])->name('page.destroy');
    });

    Route::resource('contact',ContactController::class)->except('show');
});

