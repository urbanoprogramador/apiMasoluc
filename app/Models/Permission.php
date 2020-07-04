<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable=[
    	'name',
    	'level',
    	'parent_id',
    	'title',
    ];

    public function inpust(){
    	return $this->fillable;
    }
}
