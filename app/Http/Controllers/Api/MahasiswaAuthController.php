<?php

namespace App\Http\Controllers\Api;

use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MahasiswaAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:table_user_mahasiswa',
            'password' => 'required|string|min:8',
            'nim' => 'required|string|min:5',
            'no_hp' => 'required|string|min:10',
            'lokasi' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $mahasiswa = Mahasiswa::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nim' => $request->nim,
            'no_hp' => $request->no_hp,
            'lokasi' => $request->lokasi
        ]);

        $token = $mahasiswa->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $mahasiswa,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function update($id, Request $request)
    {

        // membuat validasi semua field wajib diisi
        // email harus format email dan unik
        // password minimal 8 karakter
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:table_user_mahasiswa',
            'password' => 'required|string|min:8',
            'nim' => 'required|string|min:5',
            'no_hp' => 'required|string|min:10',
            'lokasi' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        //melakukan update data berdasarkan id
        $mahasiswa              = Mahasiswa::find($id);
        $mahasiswa->name        = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->lokasi = $request->lokasi;
        $mahasiswa->password    = Hash::make($request->password);

        //jika berhasil maka simpan data dengan method $post->save()
        if ($mahasiswa->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $mahasiswa]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        //mencari data sesuai $id
        //$id diambil dari ujung url yang kita kirimkan dengan postman
        $mahasiswa = Mahasiswa::findOrFail($id);

        // jika data berhasil didelete maka tampilkan pesan json 
        if ($mahasiswa->delete()) {
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

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $mahasiswa = Mahasiswa::where('email', $request->email)->first();

        $token = $mahasiswa->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function index()
    {
        return Mahasiswa::all();
    }

    public function logout(Request $request)
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
