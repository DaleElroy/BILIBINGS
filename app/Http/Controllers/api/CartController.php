<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::all();
        return response()->json(['Cart' => $cart]);
    }
    public function addToCart(Request $request, $productId)
    {
        
            $product = Product::find($productId);
            
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $cart = new Cart;
            $cart->user_id = $request->id; 
            $cart->product_id = $product->id; 
            
            $cart->product_title = $product->title;
            $cart->product_price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->product_category = $product->category;
            $cart->product_photo = $product->gallery;
            $cart->save();

            return response()->json(['message' => 'Product added to cart successfully'], 200);
        
        }
    }

