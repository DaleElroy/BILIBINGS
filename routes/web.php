<?php

use App\Http\Controllers\BeadController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('addcart/{id}',[CartController::class,'addcart']);
Route::post('addbuy/{id}',[CartController::class,'buynow']);


Route::post('cart',[ProductController::class,'addbuy']);
Route::get('cart',[CartController::class,'showcart']);
Route::get('delete/{id}',[ProductController::class,'deletecart']);
Route::get('search/{title}',[ProductController::class,'search']);

Route::get('/',[CarouselController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('dashboard',[CarouselController::class,'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('adminregister','register')->name('backend.register');
    Route::post('adminregister','registerSave')->name('backend.register.save');
    Route::get('admindashboard','dashBoard');
});

Route::get('/test', [ProductController::class, 'categorys'])->name('product');




require __DIR__.'/auth.php';
Route::get('/customize',function(){
    return view('customize');
});
Route::get('about',function(){
    return view('about');
});

Route::get('shop', [ProductController::class, 'categorys'])->name('product');
Route::get('shop/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('carousel',[CarouselController::class,'index'])->name('carousel');

Route::get('customize',[BeadController::class,'index'])->name('customize');
Route::get('latest',[LatestController::class,'index'])->name('latest');
Route::get('home',[MainController::class,'index'])->name('main');
// Route::post('add_to_cart',[ProductController::class,'addToCart'])->name('addtocart');






Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});


    Route::get('home',[LoginController::class,'admin'])->name('backend.admin');
    
    
    Route::get('post',[LoginController::class,'post']);

    Route::controller(AdminController::class)->group(function(){
        Route::get('adminusers','userData');
        route::get('/adminusers/create','create');
        Route::get('/adminusers/{user}/edit','edit');
        Route::post('/adminusers','store');
        Route::put('/adminusers/{user}','update');
        Route::delete('/adminusers/{user}','destroy');
    });
    Route::get('adminusers',[AdminController::class,'userData'])->name('backend.user');
    Route::delete('adminusers/{user}', [AdminController::class, 'destroy'])->name('backend.user');
    


    
    Route::controller(AdminController::class)->group(function(){
        Route::get('adminproduct','productList');
        route::get('adminproduct/create','create');
        Route::get('adminproduct/{product}/edit','editproduct');
        Route::post('adminproduct','store');
        Route::put('adminproduct/{product}','update');
        Route::delete('/dminproduct/{product}','destroy');
    });
    Route::get('adminproduct',[AdminController::class,'productList'])->name('backend.product.index');
    Route::delete('adminproduct/{product}', [AdminController::class, 'destroy'])->name('backend.product.index');
    Route::get('checkouts',function(){
        return view('checkout');

    });
   


// Route::get('adminuser',[UserController::class,'userData'])->name('backend.user');
// Route::get('adminproduct',[ProductController::class,'index'])->name('backend.product.index');
