<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Speeden\Http\Controllers\Address\GetAddressController;
use Speeden\Http\Controllers\Address\StoreAddressController;
use Speeden\Http\Controllers\User\FindUserController;

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

/**Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 * return $request->user();
 * });*/

Route::get('user/{id}', FindUserController::class);
Route::get('address/{id}', GetAddressController::class);
Route::post('user/{user}/address/store', StoreAddressController::class);
