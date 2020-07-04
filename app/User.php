<?php

namespace App;

use App\Models\Role;
use App\Models\Address;
use App\Models\SocialNetwork;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable ,HasApiTokens,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password','pic','occupation','companyName','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPicAttribute($value){
        return secure_asset(Storage::url($value));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inputs(){
        return $this->fillable;
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function socialNetwork(){
        return $this->hasOne(SocialNetwork::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
}
