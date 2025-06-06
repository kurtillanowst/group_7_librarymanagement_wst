<?php

use App\Models\category;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;


use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home', [AdminController::class, 'index'])->middleware(['auth', 'verified']);

route::get('/home',[AdminController::class,'index']);


route::get('/category_page',[AdminController::class,'category_page']);

Route::post('/add_category',[AdminController::class,'add_category']);

route::get('/cat_delete/{id}',[AdminController::class,'cat_delete']);

route::get('/edit_category/{id}',[AdminController::class,'edit_category']);

Route::post('/update_category/{id}',[AdminController::class,'update_category']);

route::get('/add_book',[AdminController::class,'add_book']);

route::get('/store_book',[AdminController::class,'store_book']);

Route::get('/show_book', [AdminController::class, 'show_book']);