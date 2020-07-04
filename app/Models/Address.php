<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable=[
    	"address_line",
    	"city",
    	"state",
    	"post_code",
    ];
}
