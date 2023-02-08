<?php

use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('tag' , TagController::class);
Route::apiResource('category' , CategoryController::class);
Route::get('advertisement' , [AdvertisementController::class , 'index']);