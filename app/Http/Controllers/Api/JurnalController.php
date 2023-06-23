<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurnalController extends Controller
{
    public function postJurnalData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pkl_id' => 'required|exists:pkl,id',
            'kegiatan' => 'required|string|max:255',
            'alatbahan' => 'required|string|max:255',
            'waktu' => 'required|string|max:200',
            'status' => 'required|in:1,2,3',
            'materi' => 'required|string|max:2500',
            'prosedur' => 'required|string|max:255',
            'hasil' => 'required|string|max:255',
            'komentar' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $jurnal = jurnal::create([
            'pkl_id' => $request->pkl_id,
            'kegiatan' => $request->kegiatan,
            'alatbahan' => $request->alatbahan,
            'waktu' => $request->waktu,
            'status' => $request->status,
            'materi' => $request->materi,
            'prosedur' => $request->prosedur,
            'hasil' => $request->hasil,
            'komentar' => $request->komentar,
        ]);

        return response()->json([
            'data' => $jurnal
        ]);
    }

    public function getJurnalData()
    {
        return jurnal::all();
    }
}
