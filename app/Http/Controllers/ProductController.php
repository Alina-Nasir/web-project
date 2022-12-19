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
        return view('categories',['categories'=>$categories,'userType'=>$userType]);
    }
    //function for shop grid

    public function category($userType, $categoryId){
       
        $products = Product::where([['userType',$userType],['categoryId',$categoryId]])->get();
       
        return view('products',['products'=>$products]);
    }

    public function description(Request $request){
        $productId = $request->input('id');
        $product = Product::find($productId);
        return view('productDescription',['product'=>$product]);
    }

    public function addProduct(){
        return view('addProduct');
    }
    public function addCategory(){
        return view('addCategory');
    }
    public function addNewCategory(Request $request){
        $request->validate([
            'categoryName'=>'required',
            'userType'=>'required',
            'image' => 'required|image',

        ]);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
    //     Category::create([

    //         'categoryName'=>$request->categoryName,
    //         'userType'=>$request->userType,
    //         'image' =>$imageName,
    //    ]);
        $category= new Category;
        $category->categoryName= $request->categoryName;
        $category->userType= $request->userType;
        $category->image= $imageName;
        $category->save();
       return back()->with('success', 'Category added Successfully!');

    }
    public function addNewProduct(Request $request){
        $request->validate([
            'productName'=>'required',
            'material'=>'required',
            'description'=>'required',
            'small'=>'required',
            'medium'=>'required',
            'large'=>'required',
            'categoryId'=>'required',
            'userType'=>'required',
            'price'=>'required',
            'picture' => 'required|image',

        ]); 
        $picName = $request->file('picture')->getClientOriginalName();
        $request->file('picture')->move(public_path('images'), $picName);
        $product= new Product;
        $product->productName=$request->productName;
        $product->material=$request->material;
        $product->description=$request->description;
        $product->categoryId=$request->categoryId;
        $product->userType=$request->userType;
        $product->price=$request->price;
        $product->picture=$picName;
        //$productId= $product->id();
        $product->save();
        $inventory=new Inventory;
        $inventory->productId=Product::latest()->first()->productId;
        $inventory->small=$request->small;
        $inventory->medium=$request->medium;
        $inventory->large=$request->large;
        $inventory->save();
        return back()->with('success', 'Product added Successfully!');
    }
}
