<?php


use App\Http\Controllers\API\PKLController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\KegiatanController;
use App\Http\Controllers\API\KehadiranController;
use App\Http\Controllers\API\KuesionerController;
use App\Http\Controllers\API\PenilaianController;
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


Route::post('/user/register', [UserController::class, 'index'])->name('User');
Route::post('/user/login', [UserController::class, 'login'])->name('User');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/profile', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::post('/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('/user/data/alluser', [UserController::class, 'data']);

    Route::post('/user/pkl', [PKLController::class, 'index']);
    Route::get('/user/pkl/data', [PKLController::class, 'data']);

    Route::get('/user/kegiatan', [KegiatanController::class, 'getData']);
    Route::post('/user/kegiatan/tambah', [KegiatanController::class, 'createData']);
    Route::post('/user/kegiatan/hapus/{id}', [KegiatanController::class, 'deleteData']);
    Route::post('/user/kegiatan/update/{id}', [KegiatanController::class, 'updateData']);

    Route::get('/user/kehadiran', [KehadiranController::class, 'getKehadiran']);
    Route::post('/user/kehadiran/tambah', [KehadiranController::class, 'indexKehadiran']);
    Route::post('/user/kehadiran/update/{id}', [KehadiranController::class, 'updateKehadiran']);
    Route::post('/user/kehadiran/delete/{id}', [KehadiranController::class, 'deleteKehadiran']);

    Route::get('/user/penilaian', [PenilaianController::class, 'getPenilaian']);
    Route::post('/user/penilaian/tambah', [PenilaianController::class, 'indexPenilaian']);
    Route::post('/user/penilaian/update/{id}', [PenilaianController::class, 'updatePenilaian']);
    Route::post('/user/penilaian/delete/{id}', [PenilaianController::class, 'deletePenilaian']);

    Route::get('/user/kuesioner', [KuesionerController::class, 'getKuesioner']);
    Route::post('/user/kuesioner/tambah', [KuesionerController::class, 'indexKuesioner']);
    Route::post('/user/kuesioner/update/{id}', [KuesionerController::class, 'updateKuesioner']);
    Route::post('/user/kuesioner/delete/{id}', [KuesionerController::class, 'deleteKuesioner']);
});


// // API data mahasiswa
// Route::post('/mahasiswa/register', [MahasiswaAuthController::class, 'register']);
// Route::post('/mahasiswa/login', [MahasiswaAuthController::class, 'login']);
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/mahasiswa/get-data', function (Request $request) {
//         return $request->user();
//     });
//     Route::get('/mahasiswa/all-data', [MahasiswaAuthController::class, 'index']);
//     Route::post('/mahasiswa/logout', [MahasiswaAuthController::class, 'logout']);
//     Route::post('/mahasiswa/update/{id}', [MahasiswaAuthController::class, 'update']);
//     Route::post('/mahasiswa/delete/{id}', [MahasiswaAuthController::class, 'delete']);

//     Route::post('/pkl', [PKLController::class, 'postDataPkl']);
// });

// // API Data Dosen Pembimbing
// Route::post('/dosbing/register', [DosbingAuthController::class, 'dosenRegister']);
// Route::post('/dosbing/login', [DosbingAuthController::class, 'dosenLogin']);
// Route::middleware('auth:sanctum')->get('/dosbing/get-data', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/dosbing/all-data', [DosbingAuthController::class, 'dosenIndex']);
//     Route::post('/dosbing/logout', [DosbingAuthController::class, 'dosenLogout']);
//     Route::post('/dosbing/update/{id}', [DosbingAuthController::class, 'dosenUpdate']);
//     Route::post('/dosbing/delete/{id}', [DosbingAuthController::class, 'dosenDelete']);
// });

// //API Data Dosen Pembimbing Lapangan
// Route::post('/dpl/register', [DPLController::class, 'dplRegister']);
// Route::post('/dpl/login', [DPLController::class, 'dplLogin']);
// Route::middleware('auth:sanctum')->get('/dpl/get-data', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/dpl/all-data', [DPLController::class, 'dplIndex']);
//     Route::post('/dpl/logout', [DPLController::class, 'dplLogout']);
//     Route::post('/dpl/update/{id}', [DPLController::class, 'dplUpdate']);
//     Route::post('/dpl/delete/{id}', [DPLController::class, 'dplDelete']);
// });
