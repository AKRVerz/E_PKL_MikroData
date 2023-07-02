<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\KuesionerRequest;
use App\Interfaces\KuesionerRepositoryInterface;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    private KuesionerRepositoryInterface $KuesionerRepository;

    public function __construct(KuesionerRepositoryInterface $KuesionerRepository){
        $this->KuesionerRepository = $KuesionerRepository;
    }

    public function getKuesioner(){
        $data = Kuesioner::get();

        return response()->json([
            'body' => $data
        ]);
    }

    public function indexKuesioner(KuesionerRequest $request){
        $request->validated();

        return response()->json([
            'body' => $this->KuesionerRepository->createKuesioner($request->all())
        ]);
    }

    public function updateKuesioner($id, KuesionerRequest $request)
    {
        $request->validated();

        $kuesioner          = Kuesioner::find($id);
        $kuesioner->pkl_id  = $request->pkl_id;
        $kuesioner->no1     = $request->no1;
        $kuesioner->no2     = $request->no2;
        $kuesioner->no3     = $request->no3;
        $kuesioner->no4     = $request->no4;
        $kuesioner->no5     = $request->no5;

        if ($kuesioner->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $kuesioner]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function deleteKuesioner($id)
    {

        $kuesioner= Kuesioner::findOrFail($id);

        if ($kuesioner->delete()) {
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
