<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsApiController;
use App\Http\Controllers\Ticket_typesApiController;
use App\Http\Controllers\User_deptsApiController;
use App\Http\Controllers\UserApiController;

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

Route::middleware('api')->prefix('v1')->group(function() {
    Route::apiResource('departments', DepartmentsApiController::class);
    Route::apiResource('ticket_types', Ticket_typesApiController::class);
    Route::apiResource('users', UserApiController::class);
    Route::apiResource('user_departments', User_deptsApiController::class);
});


