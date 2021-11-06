<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function list(){
        $users = User::all();

        return response($users, 200);
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string'
        ]);
        
        if(!$validation->fails()){
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            return response($user, 201);
        }
        
        return response(['status'=>false, 'errors'=>$validation->errors()->toArray()], 403);
    }

    public function update(Request $request, $id){
        $validation = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'nullable|string',
            'password_old'=>'required_with:password|string'
        ]);
        
        if(!$validation->fails()){
            $data = $request->all();

            $user = User::find($id);
            
            if($data['password'] && !Hash::check($data['password_old'], $user->password)){
                return response(['status'=>false, 'errors'=>['password_old'=>'password is incorrect']], 403);
            }
            
            $user->email = $data['email'];
            $user->name = $data['name'];
            if($data['password']){
                $user->password = Hash::make($data['password']);
            }

            $user->save();

            return response($user, 201);
        }
        
        return response(['status'=>false, 'errors'=>$validation->errors()->toArray()], 403);
    }
}
