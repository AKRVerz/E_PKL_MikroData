<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    private UserRepositoryInterface $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index(UserRequest $request)
    {
        $request->validated();


        if ($request['nim'] == null) {
            $request['nim'] = null;
        }
        if ($request['no_hp'] == null) {
            $request['no_hp'] = null;
        }
        if ($request['nip'] == null) {
            $request['nip'] = null;
        }
        if ($request['jabatan'] == null) {
            $request['jabatan'] = null;
        }
        if ($request['lokasi'] == null) {
            $request['lokasi'] = null;
        }

        return response()->json([
            'body' => $this->UserRepository->createUser($request->all())
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(([
                '_status' => 422,
                'reason' => "email atau password salah",
            ]), 422);
        }

        $user = Auth::user();

        $tokenResult = $user->createToken('token')->plainTextToken;

        return $tokenResult;
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

    public function update($id, UpdateRequest $request)
    {
        $request->validated();

        //melakukan update data berdasarkan id
        $user              = User::find($id);
        $user->name        = $request->name;
        $user->no_hp = $request->no_hp;

        //jika berhasil maka simpan data dengan method $post->save()
        if ($user->save()) {
            return response()->json(['Post Berhasil Disimpan', 'data' => $user]);
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function delete($id)
    {

        $user = User::findOrFail($id);

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

    public function data()
    {
        return User::all();
    }
}