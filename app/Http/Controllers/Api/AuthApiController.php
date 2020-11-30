<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;

class AuthApiController extends Controller
{

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
        {
            return response()->json([
                "Estatus" => 0,
                "Data" => [],
                "Mensaje" => "Usuario No encontrado"
            ], 401);
        }else{
            $user = $request->user();
            // $tokenResult = $user->createToken('Personal Access Token');
    
            // $token = $tokenResult->token;
            // if ($request->remember_me)
            //     $token->expires_at = Carbon::now()->addWeeks(1);
            // $token->save();
    
            return response()->json([
                "Estatus" => 1,
                "Data" => $user,
                "Mensaje" => "Operación realizada con éxito"
                // 'access_token' => $tokenResult->accessToken,
                // 'token_type' => 'Bearer',
                // 'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
                // 'user' => $user
            ]);
        }



    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function Save_token(Request $request)
    {
        $token = $request->token;
        $iduser = $request->iduser;

        $token_user = DB::table('token_user')
                        ->where('iduser',$iduser)
                        ->where('token',$token)
                        ->get();
        
        if(!$token_user->isEmpty())
        {
            return response()->json([
                "Estatus" => 1,
                "Data" => $token_user[0]->token,
                "Mensaje" => "Operación realizada con éxito"
            ]);

        }else{

            DB::table('token_user')->insert([
                "iduser" => $iduser, "token" => $token
            ]);

            $token_user = DB::table('token_user')
                ->where('iduser',$iduser)
                ->where('token',$token)
                ->get();

            return response()->json([
                "Estatus" => 1,
                "Data" => $token_user[0]->token,
                "Mensaje" => "Operación realizada con éxito"
            ]);

        }



    }


}
