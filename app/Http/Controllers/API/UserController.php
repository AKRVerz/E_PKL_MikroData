<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        
        $request["no_hp"] = null;

        return response()->json([
            'body' => $this->UserRepository->createUser($request->all())
        ]);
    }

    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($request->email != $user->email) {
            return response()->json([
                '_status' => 422,
                'message' => 'Mahasiswa tidak ditemukan',
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
