<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trangchu',[PageController::class,'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);
Route::get('/detail/{id}', [PageController::class, 'getDetail']);
Route::get('/type',[PageController::class, 'getLoaiSp']);
// Route::get('/add-to-cart',[PageController::class, 'getAdminAdd'])->name('add-product');
Route::get('/admin',[PageController::class, 'getIndexAdmin'])->name('export');
Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit']);											
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);													
// Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);
Route::get('/about', [PageController::class, 'getAbout']);	
Route::get('/lienhe', [PageController::class, 'getContact']);								
Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);

