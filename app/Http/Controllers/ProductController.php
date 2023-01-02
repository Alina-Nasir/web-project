<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;

class ProductController extends Controller
{
    //function for main page with categories
    public function index($userType){
        $categories = Category::where('userType',$userType)->get();
        return view('categories',['categories'=>$categories,'userType'=>$userType]);
    }
    //function for shop grid

    public function category($userType, $categoryId, Request $request){
        $categories = Category::where('userType',$userType)->get();
        $recents = $products = Product::where([['userType',$userType],['categoryId',$categoryId]])
        ->orderBy('created_at','desc')->take(3)
        ->get();
        

        if($request->get('sort')=='price_asc'){
            $products = Product::where([['userType',$userType],['categoryId',$categoryId]])
            ->orderBy('price','asc')
            ->get();
        }
        elseif($request->get('sort')=='price_desc'){
            $products = Product::where([['userType',$userType],['categoryId',$categoryId]])
            ->orderBy('price','desc')
            ->get();
        }
        elseif($request->get('sort')=='newest'){
            $products = Product::where([['userType',$userType],['categoryId',$categoryId]])
            ->orderBy('created_at','desc')
            ->get();
        }
        else{
            $products = Product::where([['userType',$userType],['categoryId',$categoryId]])->get();
        }
       
        return view('products',['products'=>$products,'categories'=>$categories,'recents'=>$recents]);
    }

    public function description(Request $request){
        $productId = $request->input('id');
        $product = Product::find($productId);
        $availability = Inventory::where('productId','=',$productId)
        ->where((function ($query) {
            $query->where('small','>=',1)
                ->orWhere('medium','>=',1)
                ->orWhere('large','>=',1);
        }))
        ->get();
        return view('productDescription',['product'=>$product,'availability'=>$availability]);
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
            'pic2' => 'required|image',
            'pic3' => 'required|image',
            'pic4' => 'required|image',

        ]); 
        $picName = $request->file('picture')->getClientOriginalName();
        $request->file('picture')->move(public_path('images'), $picName);
        $pic2 = $request->file('pic2')->getClientOriginalName();
        $request->file('pic2')->move(public_path('images'), $pic2);
        $pic3 = $request->file('pic3')->getClientOriginalName();
        $request->file('pic3')->move(public_path('images'), $pic3);
        $pic4 = $request->file('pic4')->getClientOriginalName();
        $request->file('pic4')->move(public_path('images'), $pic4);
        $product= new Product;
        $product->productName=$request->productName;
        $product->material=$request->material;
        $product->description=$request->description;
        $product->categoryId=$request->categoryId;
        $product->userType=$request->userType;
        $product->price=$request->price;
        $product->picture=$picName;
        $product->pic2=$pic2;
        $product->pic3=$pic3;
        $product->pic4=$pic4;
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

    public function SearchAutoComplete(Request $request){
        $query = $request->get('term','');
        $services = Product::where('productName','LIKE','%'.$query.'%')->get();
        $data = [];
        foreach($services as $service){
            $data[]=[
                'value'=>$service->productName,
                'id'=>$service->productId
            ];  
        }
        if(count($data)){
            return $data;
        }
        else{
            return['value'=>'No Results Found','id'=>''];
        }
        }
    
        public function result(Request $request){
            $serachingdata = $request->input('search_product');
            $products = Product::where('productName','LIKE','%'.$serachingdata.'%')->first();
            if($products){
                if(isset($_POST[('searchbtn')])){
                       return redirect($products->userType.'/'.$products->categoryId);
                }
                else{
                   return redirect($products->userType.'/'.$products->categoryId);
                }
    
            }
            else{
                return redirect('/')->with('status','Product not available');
            }
    
        }
}
