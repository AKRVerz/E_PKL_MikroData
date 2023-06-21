<?php

namespace App\Http\Controllers\Api;

use App\Models\Dosbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class DosbingAuthController extends Controller
{
    public function dosenRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:table_user_dosbing',
            'password' => 'required|string|min:8',
            'nip' => 'required|string|min:5',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $dosbing = Dosbing::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
        ]);

        $token = $dosbing->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $dosbing,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function dosenLogin(Request $request)
    {
        $user = Dosbing::where('email', $request->email)->first();

        if ($request->email != $user->email) {
            return response()->json([
                '_status' => 422,
                'message' => 'Dosen Pembimbing tidak ditemukan',
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

    public function dosenUpdate($id, Request $request)
    {

        // membuat validasi semua field wajib diisi
        // email harus format email dan unik
        // password minimal 8 karakter
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:table_user_dosbing',
            'password' => 'required|string|min:8',
            'nip' => 'required|string|min:5',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        //melakukan update data berdasarkan id
        $dosbing              = Dosbing::find($id);
        $dosbing->name        = $request->name;
        $dosbing->nip = $request->nim;
        $dosbing->password    = Hash::make($request->password);

        //jika berhasil maka simpan data dengan method $post->save()
        if ($dosbing->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $dosbing]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function dosenDelete($id)
    {
        //mencari data sesuai $id
        //$id diambil dari ujung url yang kita kirimkan dengan postman
        $dosbing = Dosbing::findOrFail($id);

        // jika data berhasil didelete maka tampilkan pesan json 
        if ($dosbing->delete()) {
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
        return Dosbing::all();
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
