<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\JurnalRequest;
use App\Interfaces\JurnalRepositoryInterface;
use App\Models\Jurnal;
use App\Models\PKL;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    private JurnalRepositoryInterface $JurnalRepository;

    public function __construct(JurnalRepositoryInterface $JurnalRepository)
    {
        $this->JurnalRepository = $JurnalRepository;
    }

    public function index(JurnalRequest $request)
    {
        $request->validated();

        return response()->json([
            'body' => $this->JurnalRepository->createJurnal($request->all())
        ]);
    }

    public function data(Request $request)
    {
        $userToken = $request->user();

        // if ($userToken->roles_id != 1) {
        //     return response()->json([
        //         'body' => "Hanya mahasiswa yang dapat mengakses fitur ini"
        //     ], 401);
        // }

        $data = Jurnal::get();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]["pkl"] = PKL::where('id', $data[$i]->pkl_id)->first();
        }

        return response()->json([
            'body' => $data
        ]);
    }
    public function update($id, JurnalRequest $request)
    {
        $request->validated();

        //melakukan update data berdasarkan id
        $jurnal              = Jurnal::find($id);
        $jurnal->pkl_id        = $request->pkl_id;
        $jurnal->kegiatan       = $request->kegiatan;
        $jurnal->alatbahan       = $request->alatbahan;
        $jurnal->waktu       = $request->waktu;
        $jurnal->status       = $request->status;
        $jurnal->materi       = $request->materi;
        $jurnal->hasil       = $request->hasil;
        $jurnal->komentar       = $request->komentar;
        $jurnal->prosedur       = $request->prosedur;



        //jika berhasil maka simpan data dengan method $post->save()
        if ($jurnal->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $jurnal]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function delete($id, Request $request)
    {
        $userToken = $request->user();

        if ($userToken->roles_id != 1) {
            return response()->json([
                'body' => "Hanya mahasiswa yang dapat mengakses fitur ini"
            ], 401);
        }

        $jurnal = Jurnal::findOrFail($id);

        if ($jurnal->delete()) {
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
