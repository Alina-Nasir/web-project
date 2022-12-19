<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = 60*24*30;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated']);
                    }
                }
            }
        }
    }




    public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('cart',['cart_data'=>$cart_data]);
    }
    //
    public function addtocart(Request $request){
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $size = $request->input('size');


        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60*24*30;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                }
            }
        }
        else
        {

        $products = Product::find($prod_id);
        $prod_name = $products->productName;
        $prod_image = $products->picture;
        $priceval = $products->price;
        $description = $products->description;
        if($products)
        {
            $item_array = array(
                'item_id' => $prod_id,
                'item_name' => $prod_name,
                'item_quantity' => $quantity,
                'item_price' => $priceval,
                'item_image' => $prod_image,
                'size'=>$size,
                'item_description'=>$description
            );
            $cart_data[] = $item_array;

            $item_data = json_encode($cart_data);
            $minutes = 60*24*30;
            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
            return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
        }

    }
    
}
public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60*24*30;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }
}