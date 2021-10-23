<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'api_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id',);
    }
}
