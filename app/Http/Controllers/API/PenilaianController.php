<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenilaianRequest;
use App\Interfaces\PenilaianRepositoryInterface;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    private PenilaianRepositoryInterface $PenilaianRepository;

    public function __construct(PenilaianRepositoryInterface $PenilaianRepository){
        $this->PenilaianRepository = $PenilaianRepository;
    }

    public function getPenilaian(){
        $data = Penilaian::get();

        return response()->json([
            'body' => $data
        ]);
    }

    public function indexPenilaian(PenilaianRequest $request){
        $request->validated();

        return response()->json([
            'body' => $this->PenilaianRepository->createPenilaian($request->all())
        ]);
    }

    public function updatePenilaian($id, PenilaianRequest $request)
    {
        $request->validated();

        $penilaian              = Penilaian::find($id);
        $penilaian->pkl_id      = $request->pkl_id;
        $penilaian->tgl_mulai   = $request->tgl_mulai;
        $penilaian->tgl_selesai = $request->tgl_selesai;
        $penilaian->rerata      = $request->rerata;
        $penilaian->pengetahuan = $request->pengetahuan;
        $penilaian->pelaksanaan = $request->pelaksanaan;
        $penilaian->kerjasama   = $request->kerjasama;
        $penilaian->kreativitas = $request->kreativitas;
        $penilaian->kedisiplinan = $request->kedisiplinan;
        $penilaian->sikap       = $request->sikap;

        if ($penilaian->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $penilaian]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function deletePenilaian($id)
    {

        $penilaian = Penilaian::findOrFail($id);

        if ($penilaian->delete()) {
            return response([
                'Berhasil Menghapus Data'
            ]);
        } else {
            //response jika gagal menghapus
            return response([
                'Tidak Berhasil Menghapus Data'
            ]);
        }
    }
}
