<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MotivationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:api')->get('user', function (Request $request) {
//     return UserResource::make($request->user());
// });

Route::get('motivation', [MotivationController::class, 'index'])->name('motivation.index');

Route::middleware('auth:api')->group(function () {
    // Authentication: Logout
    Route::post('logout', [AuthController::class, 'logout']);

    // Reminder
    Route::apiResource('motivation', MotivationController::class)->except('index');
});

// Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
