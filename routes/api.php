<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\ConsumersController;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth.basic')->group(function () {

    Route::apiResource('/consumers', ConsumersController::class);
    Route::apiResource('/consumers/{consumers}/bills', BillsController::class);
    Route::get('/bills', '\App\Http\Controllers\BillsController@bills');
    Route::get('/due', '\App\Http\Controllers\BillsController@dues');

    // Route::get('/consumers/{consumer}/bills', '\App\Http\Controllers\ConsumersController@bills');
});
