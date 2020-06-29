<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserStore;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    //
	public function index()
	{
		return $this->showArray(User::all());
	}
	public function show(User $user){
		return $this->showOne($user);
	}
	public function store(UserStore $request){
		$input=$request->inputs();
        $user=User::create($input);
        return $this->showOne($user);
	}
	public function update(Request $request, User $user){

		$input=$request->inputs($user);
        $user->fill($input);
        if($user->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar',422);
        }
        $user->save();
        return $this->showOne($user);
	}
	public function delete(User $user){
		$user->delete();
		return $this->showArray([
			'msg'=>"El modelo fue eliminado",
			"user"=>$user
		]);
	}
}
