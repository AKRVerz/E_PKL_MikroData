<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\pkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PKLController extends Controller
{
    //
    // public function contoh() :  {
    //     pkl::where('pkl.id', 1)
    //     ->join('table_user_mahasiswa', 'table_user_mahasiswa.id', 'pkl.mahasiswa_id')
    //     ->join('table_user_dosbing', 'table_user_mahasiswa.id', 'pkl.mahasiswa_id')
    //     ->join('table_user_dpl', 'table_user_mahasiswa.id', 'pkl.mahasiswa_id')
    //     ->get();
    // }

    public function postDataPkl(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'mahasiswa_id' => 'required|exists:table_user_mahasiswa,id',
            'dosbing_id' => 'required|exists:table_user_dosbing,id',
            'dpl_id' => 'required|exists:table_user_dpl,id',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $pkl = pkl::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosbing_id' => $request->dosbing_id,
            'dpl_id' => $request->dpl_id,
        ]);

        return response()->json([
            'data' => $pkl
        ]);
    }
}
