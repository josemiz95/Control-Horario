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
        Role::create([ 'name'=>'Admin' ]);
        Role::create([ 'name'=>'User' ]);
        User::create([ 'name'=>'Josemi', 'email'=>'josemiz95@gmail.com', 'password'=>Hash::make('Password123') ]);
    }
}
