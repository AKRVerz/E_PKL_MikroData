<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DPL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class DPLController extends Controller
{
    public function dplRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:table_user_dpl',
            'password' => 'required|string|min:8',
            'jabatan' => 'required|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $dpl = DPL::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
        ]);

        $token = $dpl->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $dpl,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function dplLogin(Request $request)
    {
        $user = DPL::where('email', $request->email)->first();

        if ($request->email != $user->email) {
            return response()->json([
                '_status' => 422,
                'message' => 'Dosen Pembimbing Lapangan tidak ditemukan',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                '_status' => 422,
                'message' => 'Password salah',
            ]);
        }

        $tokenResult = $user->createToken('authToken')->plainTextToken;
        Auth::login($user);

        return $tokenResult;
    }

    public function dplUpdate($id, Request $request)
    {

        // membuat validasi semua field wajib diisi
        // email harus format email dan unik
        // password minimal 8 karakter
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'jabatan' => 'required|string',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        //melakukan update data berdasarkan id
        $dpl              = DPL::find($id);
        $dpl->name        = $request->name;
        $dpl->jabatan = $request->jabatan;
        $dpl->password    = Hash::make($request->password);

        //jika berhasil maka simpan data dengan method $post->save()
        if ($dpl->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $dpl]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function dplDelete($id)
    {
        //mencari data sesuai $id
        //$id diambil dari ujung url yang kita kirimkan dengan postman
        $dpl = DPL::findOrFail($id);

        // jika data berhasil didelete maka tampilkan pesan json 
        if ($dpl->delete()) {
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

    public function dosenIndex()
    {
        return DPL::all();
    }

    public function dosenLogout(Request $request)
    {
        $accessToken = $request->bearerToken();

        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);

        // Revoke token
        $token->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}
