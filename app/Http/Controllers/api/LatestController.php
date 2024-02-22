<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Latest;
use Illuminate\Http\Request;

class LatestController extends Controller
{
    public function index(){
        return Latest::all();
    }
    public function store(Request $request){
        
        $request->validate([
            'name' => 'required', 
            'latest_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        
        $product = new Latest;
        $product->name = $request->name; 
    
        
        if ($request->hasFile('latest_product')) {
            $image = $request->file('latest_product');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('latest_product'), $imageName);
            $product->latest_product = $imageName;
        } else {
           
            return response()->json(['message' => 'No file uploaded'], 400);
        }
        $product->save();
    
        // Return a success response
        return response()->json(['message' => 'Latest Product has been uploaded'], 201);
    }
    
    public function destroy($id){
        $image = Latest::find($id);
        $valid =$image->delete();
        if($valid){
            return["result"=>"The carousel has been deleted"];

        }
        else{
            return["result"=>"The Carousel id doesn't exist"];
        }
    }
}
