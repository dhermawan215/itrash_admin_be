<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $users = User::where('email', $request->get('email'))->first();

        if (!is_null($users)) {
            if (Hash::check($request->get('password'), $users->password)) {
                $token = $users->createToken('AuthToken')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $users
                ], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'unauthorized'], 401);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'name' => 'required',
            'password' => 'required',
            'handphone' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        } else {
            $users = User::where('email', $request->get('email'))->first();

            if (!is_null($users)) {
                return response()->json(['success' => false, 'message' => 'email sudah di pakai !'], 409);
            } else {
                DB::table('users')->insert([
                    'email' => $request->get('email'),
                    'name' => $request->get('name'),
                    'handphone' => $request->get('handphone'),
                    'alamat' => $request->get('alamat'),
                    'password' => Hash::make($request->get('password')),
                    'roles' => 'user',
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                return response()->json(['success' => true, 'message' => 'registrasi success'], 200);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'logout success'], 200);
    }
}
