<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public Routes
Route::post('/register',[AuthController::class,'register']); 
Route::post('/login',[AuthController::class,'login']); 


Route::get('/products',[ProductController::class,'index']); 

Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('products/search/{name}',[ProductController::class,'search']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/products',[ProductController::class,'create']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::get('/detail/{id}',[ProductController::class,'detail']); 
Route::get('/post/{id}',[ProductController::class,'post']); 


