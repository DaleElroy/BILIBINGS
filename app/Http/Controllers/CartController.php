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
    public function addCart(Request $request, $productId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = Product::find($productId);
            $cart = new Cart;
            $cart->user_id = $user->id; 
            $cart->product_id = $product->id; 
            $cart->product_title = $product->title;
            $cart->product_price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->product_category = $product->category;
            $cart->product_photo = $product->gallery;
            $cart->save();

            return redirect()->back()->with('message', 'Product added to cart successfully.');
        } else {
            return redirect('login')->with('error', 'You need to login to add products to your cart.');
        }
    }

}
