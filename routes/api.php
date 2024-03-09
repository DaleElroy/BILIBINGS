<?php

use App\Http\Controllers\api\BeadController;
use App\Http\Controllers\api\CarouselController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\LatestController;
use App\Http\Controllers\api\PasswordResetController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/registered', [UserController::class, 'registered']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/send-reset-password-email', [PasswordResetController::class, 'send_reset_password_email']);
Route::post('/reset-password/{token}', [PasswordResetController::class, 'reset']);

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/login', [UserController::class, 'logged_user']);
    Route::post('/changepassword', [UserController::class, 'change_password']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route for users--------------------------->>
//Route for users--------------------------->>
// Route::apiResource('list',UserController::class);
Route::get('user',[UserController::class,'user']);
Route::post('register',[UserController::class,'add']);
Route::Put('update',[UserController::class, 'update']);
Route::delete('delete/{id}',[UserController::class,'delete']);
Route::get('search/{name}',[UserController::class,'search']);

//Data validation
Route::post('save',[UserController::class,'testdata']);

//Route for products--------------------------->>
//Route for products--------------------------->>


Route::get('product',[ProductController::class,'product']);
Route::post('product',[ProductController::class,'add']);
Route::put('product',[ProductController::class,'update']);
Route::delete('product/{id}',[ProductController::class,'delete']);
Route::get('product/{title}',[ProductController::class,'search']);
Route::get('test/{category}', [ProductController::class, 'category'])->name('product');
//Route for carousel photo--------------------------->>

Route::get('carousel',[CarouselController::class,'index']);
Route::post('carousel',[CarouselController::class,'store']);
Route::delete('carousel/{id}',[CarouselController::class,'destroy']);
//Route for latest product
Route::get('latestproduct',[LatestController::class,'index']);
Route::post('latestproduct',[LatestController::class,'store']);
Route::delete('latestproduct/{id}',[LatestController::class,'delete']);

//Route for beads customize--------------------------->>

Route::get('customize',[BeadController::class,'index']);
Route::post('customize',[BeadController::class,'store']);




//Route for Add To Cart Api
Route::get('addtocart', [CartController::class, 'index']);
Route::post('addtocart/{id}', [CartController::class, 'addToCart']);
Route::delete('cart/cart-remove/{id}', [CartController::class, 'destroy']);


//Route for one to one

Route::get('userinfo',[UserController::class,'index']);
Route::post('userinfo',[UserController::class,'store']);
Route::put('userinfo/{id}',[UserController::class,'updateDetails']);

