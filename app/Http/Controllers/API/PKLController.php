<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PKLRequest;
use App\Interfaces\PklRepositoryInterface;
use App\Models\PKL;
use App\Models\User;

class PKLController extends Controller
{
    private PklRepositoryInterface $PklRepository;

    public function __construct(PklRepositoryInterface $PklRepository)
    {
        $this->PklRepository = $PklRepository;
    }

    public function index(PKLRequest $request)
    {
        $request->validated();

        return response()->json([
            'body' => $this->PklRepository->createPKL($request->all())

        ]);
    }

    public function data()
    {
        // $userToken = $request->user();

        // if ($userToken->roles_id != 1) {
        //     return response()->json([
        //         'body' => "Hanya mahasiswa yang dapat mengakses fitur ini"
        //     ], 401);
        // }

        $data = PKL::get();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]["mahasiswa"] = User::where('id', $data[$i]->mahasiswa_id)->first();
            $data[$i]["dospem"] = User::where('id', $data[$i]->dospem_id)->first();
            $data[$i]["dpl"] = User::where('id', $data[$i]->dpl_id)->first();
        }

        return response()->json([
            'body' => $data
        ]);
    }

    public function update($id, PKLRequest $request)
    {
        $request->validated();


        $pkl = PKL::find($id);
        $pkl->mahasiswa_id = $request->mahasiswa_id;
        $pkl->dospem_id = $request->dospem_id;
        $pkl->dpl_id = $request->dpl_id;

        if ($pkl->save()) {
            return response()->json(['Data Berhasil Disimpan', 'data' => $pkl]);
        } else {
            return response()->json('Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {

        $user = PKL::findOrFail($id);

        if ($user->delete()) {
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
