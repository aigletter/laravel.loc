<?php

use App\Http\Controllers\ManualUserController;
use App\Http\Controllers\OrderController;
//use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return '<h1>Hello world</h1>';
});

Route::prefix('/orders')->group(function () {
    Route::get('/{id}/show', [OrderController::class, 'show'])
        ->where('id', '\d+')
        ->name('orders.show');
    Route::get('/{param?}/test', [OrderController::class, 'test'])->name('orders.test');
    Route::delete('/{id}/delete', function () {});
    Route::prefix('/user')->group(function () {
        Route::get('/', function () {});
        Route::get('/test', function () {});
    });
});

/*Route::get('/manual-users', [ManualUserController::class, 'list']);
Route::delete('/manual-users/{id}/delete', [ManualUserController::class, 'delete']);*/
Route::resource('users', UserController::class); // App\Http\Controllers\UserController
