<?php

use App\Http\Controllers\Api\MahasiswaAuthController;
use App\Http\Controllers\Api\DosbingAuthController;
use App\Models\Dosbing;
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


// API data mahasiswa
Route::post('/mahasiswa/register', [MahasiswaAuthController::class, 'register']);
Route::post('/mahasiswa/login', [MahasiswaAuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/mahasiswa/get-data', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswa/all-data', [MahasiswaAuthController::class, 'index']);
    Route::post('/mahasiswa/logout', [\App\Http\Controllers\Api\MahasiswaAuthController::class, 'logout']);
    Route::post('/mahasiswa/update/{id}', [MahasiswaAuthController::class, 'update']);
    Route::post('/mahasiswa/delete/{id}', [MahasiswaAuthController::class, 'delete']);
});

// API Data Dosen Pembimbing
Route::post('/dosbing/register', [\App\Http\Controllers\Api\DosbingAuthController::class, 'dosenRegister']);
Route::post('/dosbing/login', [\App\Http\Controllers\Api\DosbingAuthController::class, 'dosenLogin']);
Route::middleware('auth:sanctum')->get('/dosbing/get-data', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dosbing/all-data', [DosbingAuthController::class, 'dosenIndex']);
    Route::post('/dosbing/logout', [\App\Http\Controllers\Api\DosbingAuthController::class, 'dosenLogout']);
    Route::post('/dosbing/update/{id}', [DosbingAuthController::class, 'dosenUpdate']);
    Route::post('/dosbing/delete/{id}', [DosbingAuthController::class, 'dosenDelete']);
});
