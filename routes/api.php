<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/users/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('api.users.show');
Route::get('/v1/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::put('/v1/users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('api.users.update');
Route::post('/v1/users', [\App\Http\Controllers\UserController::class, 'store']);
