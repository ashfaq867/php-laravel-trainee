<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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

Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth:api');
Route::post('/adduser',[LoginController::class, 'store'])->middleware('auth:api');
Route::delete('remove/{id}',[LoginController::class, 'destroy'])->middleware('auth:api');
Route::get('/users',[LoginController::class, 'index'])->middleware('auth:api');
Route::get('/',[LoginController::class, 'mail']);
