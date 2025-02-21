<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TongController;
use Illuminate\Support\Facades\Route;

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