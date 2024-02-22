<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard(){
        return view('backend.dashboard');
    }

    
    public function productList(){

        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }

    





    // public function dashboard()
    // {
    //     // Retrieve data from the database
    //     $users = User::all(); // Example: Retrieve users from the User model

    //     // Pass data to the view
    //     return view('backend.dashboard', ['users' => $users]);
    // }

    public function editproduct(Product $product){
        return view('backend.product.edit',compact('product'));
    }

    public function updateproduct(Request $request, Product $product){
        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
        ]);
    
        // Handle file upload if a new file is provided
        if ($request->hasFile('gallery')) {
            // Store the new file and update the gallery field
            $imagePath = $request->file('gallery')->store('products', 'public');
            $product->gallery = $imagePath;
            $product->save();
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
    public function userData(){
        $users = User::all();
        $userCount = $users->count();
        return view('backend.user',compact('users','userCount'));
        
    }
}
