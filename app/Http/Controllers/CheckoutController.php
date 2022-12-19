<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;
use Illuminate\Support\Facades\Cookie;


class CheckoutController extends Controller
{
    public function getCheckout()
    {
       // $grandTotal = $request->input('grandTotal');
       $cookie_data = stripslashes(Cookie::get('shopping_cart'));
       $cart_data = json_decode($cookie_data, true);
       $grandTotal=0;
       $itemCount = 0;
        foreach($cart_data as $item){
            $grandTotal+=(int)$item['item_price'];
            $itemCount++;
        }  
        return view('checkout',['cart_data'=>$cart_data,'grandTotal'=>$grandTotal,'itemCount'=>$itemCount]);
    }

    public function placeOrder(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $items = json_decode($cookie_data, true);
        $grandTotal=0;
        $itemCount = 0;
        $newQuantity =0;
        foreach($items as $item){
            $grandTotal+=(int)$item['item_price'];
            $itemCount++;
        }

        $order = Order::create([
            'userId' => $request->user()->getId(),
            'grandTotal'=>$grandTotal,
            'itemCount'=>$itemCount
        ]);
        if($order){

            foreach($items as $item){
                $orderItem = new OrderItem([
                    'productId'=> $item['item_id'],
                    'quantity'=>$item['item_quantity'],
                    'price'=>$item['item_price'],
                    'size'=>$item['size'],
                    'orderId'=>$order->orderId
                ]);
                $orderItem->save();
                $inventory = Inventory::where('productId','=',$item['item_id'])->first();
                if($item['size']=='small'){
                    $newQuantity = (int)$inventory->small - (int)$item['item_quantity'];
                    $affected = Inventory::where('productId','=',$item['item_id'])->update(array('small'=>$newQuantity));
                }
                else if($item['size']=='medium'){
                    $newQuantity = (int)$inventory->medium - (int)$item['item_quantity'];
                    $affected = Inventory::where('productId','=',$item['item_id'])->update(array('medium'=>$newQuantity));
                }
                else{
                    $newQuantity = (int)$inventory->large - (int)$item['item_quantity'];
                    $affected = Inventory::where('productId','=',$item['item_id'])->update(array('large'=>$newQuantity));
                }
            }
        }
        Cookie::queue(Cookie::forget('shopping_cart'));
        return view('welcome');
    }
}
