<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
class CartController extends Controller
{
    public function showcart() {
        if (Auth::check()) {
            $user = Auth::user();
            $carts = $user->carts()->with('product')->get();
            return view('cart', compact('carts'));
        } else {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }  
    }
    public function addcart(Request $request, $productId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = Product::find($productId);
            
           
            // Check if the product already exists in the user's cart
            $existingCart = Cart::where('user_id', $user->id)
                                 ->where('product_id', $product->id)
                                 ->first();
    
            if ($existingCart) {
                // If the product already exists, update the quantity
                $existingCart->quantity += $request->quantity;
                $existingCart->save();
            } else {
                // If the product doesn't exist, create a new cart entry
                $cart = new Cart;
                $cart->user_id = $user->id; 
                $cart->product_id = $product->id; 
                $cart->product_title = $product->title;
                $cart->product_price = $product->price;
                $cart->quantity = $request->quantity;
                $cart->product_category = $product->category;
                $cart->product_photo = $product->gallery;
                $cart->save();
            }
    
            return redirect()->back()->with('message', 'Product Added successfully');
        } else {
            return redirect('login');
        }
    }
    

    public function buynow(Request $request, $productId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = Product::find($productId);
            

            $cart = new Cart;
            $cart->user_id = $user->id; 
            $cart->product_id = $product->id; 
            $cart->product_title = $product->title;
            $cart->product_price = $product->price;
            $cart->quantity = 1;
            $cart->product_category = $product->category;
            $cart->product_photo = $product->gallery;
            $cart->save();

            return redirect('cart');
            } 
        else {
        return redirect('login');
        }
    }
   

}
