<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(){
        return User::all();

        
    }
    public function add(Request $request){
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $registered= $user->save();
        if($registered)
        {
            return ["Result"=>"New user has been saved"];
        }
        else{
            return ["Result"=>"New user is failed"];
        }


    }
    public function update(Request $request){
        $user = User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $update = $user->save();

        if($update){
            return["Result"=>"Account has been updated"];
            
        }
        else{
            return["Result"=>"Account has not been updated"];
        }

    }
    public function search($name){
        return User::where("name","like","%".$name."%")->get();
    }



    public function delete($id){
        $user = User::find($id);
        $account=$user->delete();
        if($account)
        {
            return ["result "=>"Data has been deleted"];

        }
        else{
        return ["result "=>"Data has not been delete"];
        }

    }
    public function testdata(Request $request){
        $rules=array(
            "name"=>"required|min:4|max:14",
            "email" => "required|min:7|max:20|regex:/^.+@.+..+$/",
            "password"=>"required|min:8|max:20"
            
        );    
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            $user = new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $result=$user->save();
            if($result)
            {
                return ["Result"=>"New user has been saved"];
            }
            else{
                return ["Result"=>"Failed"];
            }
        }
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function registered(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'tc'=>'required',
        ]);
        if(User::where('email', $request->email)->first()){
            return response([
                'message' => 'Email already exists',
                'status'=>'failed'
            ], 200);
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'tc'=>json_decode($request->tc),
        ]);
        $token = $user->createToken($request->email)->plainTextToken;
        return response([
            'token'=>$token,
            'message' => 'Registration Success',
            'status'=>'success'
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message' => 'Login Success',
                'status'=>'success'
            ], 200);
        }
        return response([
            'message' => 'The Provided Credentials are incorrect',
            'status'=>'failed'
        ], 401);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success',
            'status'=>'success'
        ], 200);
    }
    
    public function logged_user(){
        $loggeduser = auth()->user();
        return response([
            'user'=>$loggeduser,
            'message' => 'Logged User Data',
            'status'=>'success'
        ], 200);
    }

    public function change_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $loggeduser = auth()->user();
        $loggeduser->password = Hash::make($request->password);
        $loggeduser->save();
        return response([
            'message' => 'Password Changed Successfully',
            'status'=>'success'
        ], 200);
    }
}

