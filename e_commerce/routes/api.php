<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
//category routes
Route::apiresource('/product',ProductController::class);




//products routes

Route::apiresource('/category',CategoryController::class);

// Route::get('/products',[ProductController::class, 'index']);
// Route::post('/add/product',[ProductController::class, 'store']);
// Route::get('/find/{id}',[ProductController::class, 'show']);
// Route::delete('/delete/{id}',[ProductController::class, 'destroy']);
// Route::delete('/delete/{id}',[ProductController::class, 'destroy']);

