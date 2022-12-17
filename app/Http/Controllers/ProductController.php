<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //function for main page with categories
    public function index($userType){
        $categories = Category::where('userType',$userType)->get();
        return view('categories',['categories'=>$categories]);
    }
    //function for shop grid

    public function category($userType, $categoryId){
       
        $products = Product::where([['userType',$userType],['categoryId',$categoryId]])->get();
       
        return view('products',['products'=>$products]);
    }

    
}
