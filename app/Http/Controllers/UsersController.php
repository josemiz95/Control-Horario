<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function list(){
        $users = User::all();

        return response($users, 200);
    }

    public function get($id){
        $user = User::find($id);

        return response($user, 200);
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(),[
            'role_id'=>'nullable|exists:roles,id',
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string',
            'nif'=>'nullable|string|max:15',
            'leave_days'=>'nullable|numeric',
            'status'=>'nullable|numeric|in:0,1',
            'siglas'=>'nullable|string|max:3',
            'color'=>'nullable|string|size:7|starts_with:#',
        ]);
        
        if(!$validation->fails()){
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            $user = $user->fresh();
            $user->role;

            return response($user, 201);
        }
        
        return response(['status'=>false, 'errors'=>$validation->errors()->toArray()], 403);
    }

    public function update(Request $request, $id){
        $validation = Validator::make($request->all(),[
            'role_id'=>'nullable|exists:roles,id',
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'nullable|string',
            'password_old'=>'required_with:password|string',
            'nif'=>'nullable|string|max:15',
            'leave_days'=>'nullable|numeric',
            'status'=>'nullable|numeric|in:0,1',
            'siglas'=>'nullable|string|max:3',
            'color'=>'nullable|string|max:10',
        ]);
        
        if(!$validation->fails()){
            $data = array_filter($request->all());

            $user = User::find($id);
            
            if(isset($data['password']) && isset($data['password_old']) && !Hash::check($data['password_old'], $user->password)){
                return response(['status'=>false, 'errors'=>['password_old'=>'password is incorrect']], 403);
            }

            if(isset($data['password'])){
                $data['password'] = Hash::make($data['password']);
            }

            $user->fill($data);
            $user->save();

            return response($user, 201);
        }
        
        return response(['status'=>false, 'errors'=>$validation->errors()->toArray()], 403);
    }

    public function getTodayChecks($id){
        $user = User::findOrFail($id);
        $checks = $user->checks()->where('check_time','>', Carbon::today())
                          ->orderBy('check_time','asc')->get();

        return response($checks, 200);
    }
}
