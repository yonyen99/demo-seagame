<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users',[UserController::class,'store']);

Route::post('/teams',[TeamController::class,'store']);
Route::get('/teams/{id}',[TeamController::class,'show']);

Route::get('/events',[EventController::class,'index']);
Route::post('/events',[EventController::class,'store']);
Route::get('/events/{id}',[EventController::class,'show']);
Route::put('/events/{id}',[EventController::class,'update']);
Route::delete('/events/{id}',[EventController::class,'destroy']);