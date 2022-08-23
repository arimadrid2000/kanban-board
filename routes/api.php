<?php

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\CardController;

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
// Route::post('register', [RegisterController::class, 'create']);
//Auth Routes
Route::post('register', [RegisterController::class, 'signUp']);
Route::post('login', [LoginController::class, 'signIn']);
Route::post('logout', [LogoutController::class, 'logout']);

//get PanelList Route
Route::get('panel', [PanelController::class, 'index']);

//Cards Routes
Route::get('cards', [CardController::class, 'index']);
Route::post('cards', [CardController::class, 'store']);
Route::delete('cards/{id}', [CardController::class, 'destroy']);
Route::put('cards/{id}', [CardController::class, 'update']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
