<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KehadiranController extends Controller
{
    public function postKehadiranData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pkl_id' => 'required|exists:pkl,id',
            'lokasi_id' => 'required|exists:table_user_mahasiswa,id',
            'nilai' => 'required|string|max:255',
            'waktu' => 'required|string|max:200',
            'status' => 'required|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kehadiran = kehadiran::create([
            'pkl_id' => $request->pkl_id,
            'lokasi_id' => $request->mahasiswa_id,
            'nilai' => $request->nilai,
            'waktu' => $request->waktu,
            'status' => $request->status,

        ]);

        return response()->json([
            'data' => $kehadiran
        ]);
    }

    public function getJurnalData()
    {
        return kehadiran::all();
    }
}
