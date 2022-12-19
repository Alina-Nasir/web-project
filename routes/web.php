<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::view("/","welcome");
//Route::view("/cart","cart");
Route::post("/description",[App\Http\Controllers\ProductController::class,'description']);
Route::post("/add-to-cart",[App\Http\Controllers\CartController::class,'addtocart']);
Route::get('/cart',[App\Http\Controllers\CartController::class,'index']);
Route::post('update-to-cart',[App\Http\Controllers\CartController::class,'updatetocart']);
Route::delete('delete-from-cart',[App\Http\Controllers\CartController::class,'deletefromcart']);

//Route::view("/checkout",'checkout'); //just for testing

Route::get('/checkout',[App\Http\Controllers\CheckoutController::class,'getCheckout'])->middleware(['auth', 'verified']);
Route::post('/checkout/order',[App\Http\Controllers\CheckoutController::class,'placeOrder'])->name('checkout.place.order');

Route::group(['middleware'=>'guest'], function(){
    Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::post('login',[AuthController::class, 'login'])->name('login');

    Route::get('register',[AuthController::class, 'register_view'])->name('register');
    Route::post('register',[AuthController::class, 'register'])->name('register');

});

Route::group(['middleware'=>'disable_back_btn'], function(){



  Route::group(['middleware'=>'auth'], function(){
    Route::get('home',[AuthController::class, 'home'])->name('home');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('adminhome',[AuthController::class, 'adminhome'])->name('adminhome');
    Route::get('adminlogout',[AuthController::class, 'adminlogout'])->name('adminlogout');
    Route::get('addProduct',[ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('addProduct',[ProductController::class, 'addNewProduct'])->name('addProduct');
    Route::get('addCategory',[ProductController::class, 'addCategory'])->name('addCategory');
    Route::post('addNewCategory',[ProductController::class, 'addNewCategory'])->name('addNewCategory');
    Route::get('showCustomers',[AuthController::class, 'showCustomers'])->name('showCustomers');
    Route::get('inventory',[AuthController::class, 'inventory'])->name('inventory');
    Route::get('adminProfile',[AuthController::class, 'adminProfile'])->name('adminProfile');

});
});
Route::group(['middleware'=>'guest'], function(){
  Route::get('admin',[AuthController::class, 'admin'])->name('admin');
  Route::post('admin',[AuthController::class, 'adminlogin'])->name('adminlogin');
    });

Route::get('{userType}',[App\Http\Controllers\ProductController::class,'index']);
Route::get('/{userType}/{categoryId}',[App\Http\Controllers\ProductController::class,'category']);




