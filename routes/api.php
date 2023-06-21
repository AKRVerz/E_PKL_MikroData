<?php

use App\Http\Controllers\Api\MahasiswaAuthController;
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
