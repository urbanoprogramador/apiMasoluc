<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class AuhtController extends ApiController
{
    //
    public function authenticate(Request $request)
    {

        $request->validate([
            'email'       => 'required_without:username|string|email',
            'username'    => 'required_without:email|string',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        if($request->has('username')){
            $credentials = request(['username', 'password']);
        }else{
            $credentials = request(['email', 'password']);
        }
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => __('auth.failed')], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'accessToken' => $tokenResult->accessToken,
            'user'   => $user->load(['roles','socialNetwork','address'])
        ]);
    }

    public function perfil(Request $request){
    	$user = Auth::user();
    	return $this->showOne($user->load('roles'));
    }
}
