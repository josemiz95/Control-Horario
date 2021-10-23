<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'visible'
    ];

    public function role(){
        return $this->hasMany(User::class, 'role_id');
    }

    public function access(){
        return $this->belongsToMany(Role::class, 'roles_access', 'role_id', 'access_id');
    }
}
