<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'name',
        'surname',
        'email',
        'password',
        'nif',
        'leave_days',
        'status',
        'observations',
        'siglas',
        'color'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id',);
    }

    public function timeSlots(){
        return $this->hasMany(TimeSlot::class, 'user_id');
    }
}
