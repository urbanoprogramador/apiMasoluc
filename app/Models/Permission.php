<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable=[
    	'name',
    	'lavel',
    	'parent_id',
    	'title',
    ];
}
