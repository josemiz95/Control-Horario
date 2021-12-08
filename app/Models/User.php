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
    protected $with = ['role'];

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
        'updated_at',
        'laravel_through_key'
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function timeSlots(){
        return $this->hasMany(TimeSlot::class, 'user_id');
    }

    public function checks(){
        return $this->hasManyThrough(TimeCheck::class, TimeSlot::class, 'user_id', 'slot_id');
    }

    public function getChecksDate($date){
        return $this->hasManyThrough(TimeCheck::class, TimeSlot::class, 'user_id', 'slot_id')
                    ->whereHas('timeSlot', function($q) use($date){
                        $q->where('date', $date);
                    })
                    ->orderBy('check_time','asc')->get();
    }

}
