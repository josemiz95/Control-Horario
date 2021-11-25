<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LogInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([ 'name'=>'Admin', 'color'=>'success' ]);
        $user = Role::create([ 'name'=>'Usuario', 'color'=>'secondary' ]);
        User::create([ 'name'=>'Josemi', 'email'=>'josemiz95@gmail.com', 'password'=>Hash::make('Password123'), 'role_id'=>$admin->id ]);
    }
}
