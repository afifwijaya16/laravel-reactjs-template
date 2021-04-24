<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CategoryController;

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

// auth
Route::group(array('middleware' => ['cors']), function ()
{
    Route::get('auth/create-token', [AuthApiController::class, 'createToken']);
    Route::post('auth/login', [AuthApiController::class, 'login']);
    Route::post('auth/register', [AuthApiController::class, 'register']);
    // category
    Route::apiResource('categories', CategoryController::class);
});

