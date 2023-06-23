<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function postKegiatanData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pkl_id' => 'required|exists:pkl,id',
            'capaian' => 'required|string|max:255',
            'sub_capaian' => 'required|string|max:255',
            'waktu' => 'required|string|max:200',
            'status' => 'required|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kegiatan = kegiatan::create([
            'pkl_id' => $request->pkl_id,
            'capaian' => $request->capaian,
            'sub_capaian' => $request->sub_capaian,
            'nilai' => $request->nilai,
            'waktu' => $request->waktu,
            'status' => $request->status,

        ]);

        return response()->json([
            'data' => $kegiatan
        ]);
    }

    public function getJurnalData()
    {
        return kegiatan::all();
    }
}
