<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\GetController;
use App\Http\Controllers\ApiControllers\SetController;
use App\Http\Controllers\ApiControllers\DeleteController;
use App\Http\Controllers\ApiControllers\UpdateController;
use App\Http\Controllers\ApiControllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => 'auth:sanctum'], function(){


    Route::get('ListProducts/{id?}',[GetController::class,'ListProducts'] );
    Route::get('GetProductByName/{name?}',[GetController::class,'GetProductByName'] );
    Route::get('GetProductByCategoryId/{id?}',[GetController::class,'GetProductByCategoryId'] );

    Route::get('ListCategories',[GetController::class,'ListCategories'] );
    Route::post('SetCategory',[SetController::class,'setCategory'] );
    Route::post('SetProduct',[SetController::class,'setProduct']);

    Route::delete('deleteCategory/{id}',[DeleteController::class,'DeleteCategory']);
    Route::delete('deleteProduct/{id}',[DeleteController::class,'DeleteProduct']);

    Route::put('updateCategory',[UpdateController::class,'updateCategory']);
    Route::put('updateProduct',[UpdateController::class,'updateProduct']);

//});


Route::post('login',[AuthController::class,'login']);