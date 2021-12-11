<?php

namespace Database\Seeders;

use App\Models\Access;
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
        // Roles
        $admin = Role::create([ 'name'=>'Admin', 'color'=>'success' ]);
        $user = Role::create([ 'name'=>'Usuario', 'color'=>'secondary' ]);

        // Access
        $home = Access::create(['name'=>'home', 'description'=>'Access to home']);
        $usuarios = Access::create(['name'=>'users', 'description'=>'Access to users']);
        $fichajes = Access::create(['name'=>'checks', 'description'=>'Access to checks']);

        $admin->access()->sync([$home->id, $usuarios->id, $fichajes->id]);
        $user->access()->sync([$home->id]);

        // User
        User::create([ 'name'=>'Josemi', 'email'=>'josemiz95@gmail.com', 'password'=>Hash::make('Password123'), 'role_id'=>$admin->id ]);
    }
}
