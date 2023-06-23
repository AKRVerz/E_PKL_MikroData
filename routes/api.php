<?php

use App\Http\Controllers\Api\MahasiswaAuthController;
use App\Http\Controllers\Api\DosbingAuthController;
use App\Http\Controllers\Api\DPLController;
use App\Http\Controllers\Api\JurnalController;
use App\Http\Controllers\Api\PKLController;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswa/get-data', function (Request $request) {
        return $request->user();
    });
    Route::get('/mahasiswa/all-data', [MahasiswaAuthController::class, 'index']);
    Route::post('/mahasiswa/logout', [MahasiswaAuthController::class, 'logout']);
    Route::post('/mahasiswa/update/{id}', [MahasiswaAuthController::class, 'update']);
    Route::post('/mahasiswa/delete/{id}', [MahasiswaAuthController::class, 'delete']);

    Route::post('/pkl', [PKLController::class, 'postDataPkl']);
    Route::get('/pkl/get-data', [PKLController::class, 'getDataPkl']);

    Route::post('jurnal', [JurnalController::class, 'postJurnalData']);
});

// API Data Dosen Pembimbing
Route::post('/dosbing/register', [DosbingAuthController::class, 'dosenRegister']);
Route::post('/dosbing/login', [DosbingAuthController::class, 'dosenLogin']);
Route::middleware('auth:sanctum')->get('/dosbing/get-data', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dosbing/all-data', [DosbingAuthController::class, 'dosenIndex']);
    Route::post('/dosbing/logout', [DosbingAuthController::class, 'dosenLogout']);
    Route::post('/dosbing/update/{id}', [DosbingAuthController::class, 'dosenUpdate']);
    Route::post('/dosbing/delete/{id}', [DosbingAuthController::class, 'dosenDelete']);
});

//API Data Dosen Pembimbing Lapangan
Route::post('/dpl/register', [DPLController::class, 'dplRegister']);
Route::post('/dpl/login', [DPLController::class, 'dplLogin']);
Route::middleware('auth:sanctum')->get('/dpl/get-data', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dpl/all-data', [DPLController::class, 'dplIndex']);
    Route::post('/dpl/logout', [DPLController::class, 'dplLogout']);
    Route::post('/dpl/update/{id}', [DPLController::class, 'dplUpdate']);
    Route::post('/dpl/delete/{id}', [DPLController::class, 'dplDelete']);
});
