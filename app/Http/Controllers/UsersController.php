<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list(){
        $users = User::all();

        return response($users, 200);
    }
}
