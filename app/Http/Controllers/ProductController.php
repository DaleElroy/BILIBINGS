<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function categorys()
    {
        $products = Product::all()->groupBy('category');
        return view('product', compact('products'));
    }

    public function detail($id){
        $products = Product::find($id);
        return view('detail',['product'=>$products]);
    }
    // public function addcart(Request $request, $id){
    //     if(Auth::check()){
    //         $user = auth()->user();
    //         if ($user) {
    //             $product = Product::find($id);
    //             $cart = new Cart;
    //             $cart->user_id = $user->id; // Associate cart with the authenticated user
    //             $cart->product_id = $product->id; // Set the product_id
    //             $cart->product_title = $product->title;
    //             $cart->product_price = $product->price;
    //             $cart->quantity = $request->quantity;
    //             $cart->product_category = $product->category;
    //             $cart->product_photo = $product->gallery;
    //             $cart->save();
    //             return redirect()->back()->with('message', 'Product Added successfully');
    //         }
    //     } else {
    //         return redirect('login');
    //     }
    // }
    
    public function deletecart($id){
        $data =cart::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function search($title)
    {
        $results = Product::where('title', 'like', '%' . $title . '%')->get();
        return view('carousel', compact('results'));
    }




    
   
    
}
    
    
    
