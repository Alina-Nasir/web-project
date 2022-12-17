<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\CheckoutController;

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
Route::view("/cart","cart");
Route::view("/checkout","checkout");

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
});
});

Route::get('{userType}',[App\Http\Controllers\ProductController::class,'index']);
Route::get('/{userType}/{categoryId}',[App\Http\Controllers\ProductController::class,'category']);
Route::get('/checkout',[App\Http\Controllers\CheckoutController::class,'getCheckout'])->middleware(['auth', 'verified']);
Route::post('/checkout/order',[App\Http\Controllers\CheckoutController::class,'placeOrder'])->name('checkout.place.order');



