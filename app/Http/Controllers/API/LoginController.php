<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $users = User::where('email', $request->get('email'))->first();

        if(!is_null($users))
        {
            if(Hash::check($request->get('password'), $users->password))
            {
                $token = $users->createToken('AuthToken')->plainTextToken;

                return respons()->json(['success' => true, 'akses_token' => $token], 200);
            }
            else
            {
                return respons()->json(['success' => false, 'message' => 'unauthorized'], 401);
            }
        }
        else
        {
            return respons()->json(['success' => false, 'message' => 'unauthorized'], 401);
        }
    }
}
