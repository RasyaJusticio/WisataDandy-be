<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });

    Route::group(['prefix' => 'destination'], function () {
        Route::get('', [DestinationController::class, 'index']);
        Route::get('{destination:slug}', [DestinationController::class, 'show']);
        
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::post('', [DestinationController::class, 'store']);
            Route::post('{destination}', [DestinationController::class, 'update']);
            Route::delete('{destination}', [DestinationController::class, 'destroy']);
        });
    });

    Route::group(['prefix' => 'facility'], function () {
        Route::get('', [FacilityController::class, 'index']);
        Route::get('{facility}', [FacilityController::class, 'show']);
        
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::post('', [FacilityController::class, 'store']);
            Route::post('{facility}', [FacilityController::class, 'update']);
            Route::delete('{facility}', [FacilityController::class, 'destroy']);
        });
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
