<?php

use App\Http\Controllers\ManualUserController;
use App\Http\Controllers\OrderController;
//use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsUserLoggerInMiddleware;
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
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');


    Route::get('/{param?}/test', [OrderController::class, 'test'])->name('orders.test');
    Route::delete('/{id}/delete', function () {});
    Route::prefix('/user')->group(function () {
        Route::get('/', function () {});
        Route::get('/test', function () {});
    });
});

Route::middleware(['numeric', IsUserLoggerInMiddleware::class])->group(function () {
    Route::get('/users/action/{id}', [UserController::class, 'action']);
});

/*Route::get('/manual-users', [ManualUserController::class, 'list']);
Route::delete('/manual-users/{id}/delete', [ManualUserController::class, 'delete']);*/
Route::resource('users', UserController::class); // App\Http\Controllers\UserController
Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
Route::get('/test/service', [\App\Http\Controllers\TestController::class, 'useCustomService']);





Route::get('/users/comments/{id}', [UserController::class, 'comments']);

Route::get('/swagger', function () {
    return view('swagger');
});
