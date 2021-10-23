<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';
    public  $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'roles_access', 'access_id', 'role_id');
    }
}
