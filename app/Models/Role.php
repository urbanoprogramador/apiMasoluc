<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //protected $table="Roles";
	protected $fillable=[
		'role',
		'description',
	];

	public function Users(){
		return $this->belongsToMany(User::class);
	}
}
