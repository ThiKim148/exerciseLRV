<?php

use App\Http\Controllers\ProductController;		
use App\Http\Controllers\CovidController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaobangController;
use Illuminate\Database\Schema\Blueprint;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/tinhtong', [TongController::class,'cong']);

// Route::group(['prefix' => 'tutorial'],function() {
//     Route::get('aws',function()){
//         echo"aws tutorial";

//     }
// });

Route::get('/index', [PostController::class, 'index']);
 
Route::resource('post', PostController::class);

Route::get('signup',[SignupController::class,'index']);
Route::post('signup',[SignupController::class,'displayInfor']);

Route::get('/api', [CovidController::class, 'getData']);

Route::get('/framework', [FrameworkController::class,'frame']);

Route::resource('products', ProductController::class);		

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');	

// Route::get('master', ['as'=> 'trang-chu', 'user'=>'PageController@getIndex']);

Route::get('master', [PageController::class, 'getIndex'])->name('trang-chu');

// Schema::create('products', function ())

Route::get('/create-table', [TaobangController::class, 'create']);