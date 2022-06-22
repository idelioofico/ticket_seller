<?php

use App\Http\Controllers\api\v1\CustomerControllerApi;
use App\Http\Controllers\api\v1\EventControllerApi;
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


Route::prefix('v1')->group(function () {


    Route::prefix('users')->group(function () {
        Route::get('consult', [CustomerControllerApi::class, 'consult']);
        Route::post('/register', [CustomerControllerApi::class, 'store']);
    });

    Route::prefix('events')->group(function () {
        Route::get('/',[EventControllerApi::class,'index']);
        Route::get('categories', [EventControllerApi::class, 'categories']);
    });

});
