<?php

namespace App\Http\Controllers;

use App\Models\Dosbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DosbingAuthController extends Controller
{
    public function register(Request $request)
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
}
