<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageController;
use Illuminate\Contracts\Pagination\Paginator;
use App\Http\Controllers\AuthController;

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

Route::get('/search',[PageController::class, 'getSearch'])->name('search');

Route::get('/signup', [PageController::class, 'showSignup'])->name('signup');
Route::post('/signup',[PageController::class, 'signup'])->name('signup');

Route::get('/login', function () {					
    return view('page.login');
})->name('login');		

Route::post('/login',[PageController::class, 'Login']);
    
Route::get('/logout', [PageController::class, 'Logout']);

Route::get('/add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');

Route::post('/dathang', [PageController::class, 'placeOrder'])->name('dathang');

Route::get('/delete-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');


// Route::get('/api/v1/products', [AuthController::class, 'products']);
// Route::get('/api/v1/products/{id}', [AuthController::class, 'detail']);
// Route::post('/api/v1/products', [AuthController::class, 'store']);
// Route::get('/api/v1/products/delete/{id}', [AuthController::class, 'delete']);
// Route::put('/api/v1/products/update/{id}', [AuthController::class, 'updateProduct']);