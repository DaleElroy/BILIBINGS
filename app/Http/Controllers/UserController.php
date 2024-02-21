<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller


{ 
    public function userData(){
        $users = User::all();
        $userCount = $users->count();
        return view('backend.user',compact('users','userCount'));
        
    }
    public function login(Request $request){
       $user= User::where(['email'=>$request->email])->first();
       if (!$user || Hash::check($request->password,$user->password)){
        return "Doesnt match";
       }
       else{
        $request->session()->put('user',$user);
        return redirect('/');
       }
    }
    public function edit(User $user){
        return view('backend.edit',compact('user'));
    }
    public function update(Request $request, User $user)
    {
    $user->update([
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'address' => $request->input('address'),
        
        'phone' => $request->input('phone'),
    ]);
    return back();
    }
    public function destroy(User $user){
        $user->delete();
        return redirect('backend.user')->with('message',"The Data has been Deleted Successfully");
    }

    public function store(Request $request){
        $user = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password'=> $request->password,

        ]);
        return redirect('/adminusers')->with('message','Added Successfully');

    }
    public function create(){
        return view('backend.create');
    }
}
