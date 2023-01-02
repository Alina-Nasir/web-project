<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        //validate data
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        //login code
        if(\Auth::attempt($request->only('email','password'))){

            return redirect('home');
           }
           return redirect('login')->withError('Sign In details are not valid, Please try again');





    }
    public function admin(){
        return view('auth.adminlogin');
    }
    public function adminlogin(Request $request){
        //validate data
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        //login code
        if(\Auth::attempt($request->only('email','password')) and $request->user()->is_admin==1 ){

            return redirect('adminhome');
           }
        elseif(\Auth::attempt($request->only('email','password')) and $request->user()->is_admin==0  ) {
            return redirect('/');
        }
           return redirect('admin')->withError('Sign In details are not valid, Please try again');





    }
    public function register_view(){
        return view('auth.register');
    }
    public function register_admin(){
        return view('auth.addAdmin');
    }

    public function register(Request $request){
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email' =>'required|unique:users|email',
            'password' =>'required',
            'birthday'=>'required',
            'contact'=>'required',
            'house_no'=>'required',
            'postal_code'=>'required',
       ] );
       //save in user table
       User::create([

            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email' =>$request->email,
            'password' =>\Hash::make($request->password),
            'birthday'=>$request->birthday,
            'contact'=>$request->contact,
            'house_no'=>$request->house_no,
            'postal_code'=>$request->postal_code,
       ]);
       if(\Auth::attempt($request->only('email','password'))){

        return redirect('home');
       }
       return redirect('register')->withError('Error');

    }
    public function register_new_admin(Request $request){
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email' =>'required|unique:users|email',
            'password' =>'required',
            'birthday'=>'required',
            'contact'=>'required',
            'house_no'=>'required',
            'postal_code'=>'required',
       ] );
       User::create([

        'fname'=>$request->fname,
        'lname'=>$request->lname,
        'is_admin'=>1,
        'email' =>$request->email,
        'password' =>\Hash::make($request->password),
        'birthday'=>$request->birthday,
        'contact'=>$request->contact,
        'house_no'=>$request->house_no,
        'postal_code'=>$request->postal_code,
   ]);
//    if(\Auth::attempt($request->only('email','password'))){

//     return redirect('adminhome');
//    }
   //return redirect('addAdmin')->withError('Error');
   return back()->with('success', 'Admin added Successfully!');

    }

    public function home(){
        return view('home');
    }
    public function adminhome(){
        //query
        //$men_details = Product::join('category','products.categoryId','=','categoryId')->where('userType','men')->get();
        $men_details= Product:: where('products.userType','men')->select('products.*','category.*')->join('category','category.categoryId','=','products.categoryId')->get();
        $women_details= Product::where('products.userType','women')-> select('products.*','category.*')->join('category','category.categoryId','=','products.categoryId')->get();
        $boys_details= Product::where('products.userType','boys')-> select('products.*','category.*')->join('category','category.categoryId','=','products.categoryId')->get();
        $girls_details= Product::where('products.userType','girls')-> select('products.*','category.*')->join('category','category.categoryId','=','products.categoryId')->get();
        // $men_details = Product::join('category','products.categoryId','=','category.categoryId')->select(['categoryId','categoryName','productName','description','material','price','image'])->where('userType','men')->get();

        return view('adminhome',['men_details'=>$men_details, 'women_details'=> $women_details,'boys_details'=>$boys_details,'girls_details'=>$girls_details ]);
    }

    public function showCustomers(){
        $customers= User::where('users.is_admin',NULL)->get();
        return view('showCustomers',['customers'=>$customers]);

    }
    public function showOrders(){
        $orders= Order::all();
        $orderItems= OrderItem::all();
        return view('showOrders',['orders'=>$orders,'orderItems'=>$orderItems]);

    }
    public function inventory(){
        $inventory_details= Inventory::select('inventory.*','products.*')->join('products','products.productId','=','inventory.productId')->get();
    	// $men=Inventory::select('products.price')->join('products','products.productId','=','inventory.productId')->where('products.userType','men')->get();
         $menprice=Inventory::where('products.userType','men')->join('products','products.productId','=','inventory.productId')->select(DB::raw('SUM(products.price * (inventory.small + inventory.medium + inventory.large)  )as total'))->get();
        $womenprice=Inventory::where('products.userType','women')->join('products','products.productId','=','inventory.productId')->select(DB::raw('sum(products.price * (inventory.small + inventory.medium + inventory.large) )as total'))->get();
        $boysprice=Inventory::where('products.userType','boys')->join('products','products.productId','=','inventory.productId')->select(DB::raw('sum(products.price * (inventory.small + inventory.medium + inventory.large)) as total' ))->get();
        $girlsprice=Inventory::where('products.userType','girls')->join('products','products.productId','=','inventory.productId')->select(DB::raw('sum(products.price * (inventory.small + inventory.medium + inventory.large)) as total'))->get();
        $sales= OrderItem:: select(DB::raw('SUM(order_items.quantity *order_items.price)as total'))->get();
        $Data2=array
        (
          "0" => array
                          (
                            "value" => $sales[0]['total'],
                            "name" => "Overall Sales",
                          )
          
        );
        $Data = array
        (
          "0" => array
                          (
                            "value" => $menprice[0]['total'],
                            "name" => "Men",
                          ),
          "1" => array
                          (
                            "value" => $womenprice[0]['total'],
                            "name" => "Women",
                          )
                          ,
          "2" => array
                          (
                            "value" =>$boysprice[0]['total'],
                            "name" => "Boys",
                          )
                          ,
          "3" => array
                          (
                            "value" => $girlsprice[0]['total'] ,
                            "name" => "Girls",
                          )
        );
        return view('Inventory',['inventory_details'=> $inventory_details,'Data' => $Data, 'Data2' => $Data2]);
    }
    public function adminProfile(){
        return view('adminProfile');
    }
    public function adminlogout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('home');
    }
}

