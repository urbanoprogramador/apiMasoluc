<?php

namespace App\Models;

use App\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //protected $table="Roles";
	protected $fillable=[
		'title',
		'is_core_role'
	];

	public function Users(){
		return $this->belongsToMany(User::class);
	}
	public function permissions(){
		return $this->belongsToMany(Permission::class);
	}
	public function inputs(){
    	return $this->fillable;
    }

}
