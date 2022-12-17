<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Cookie;


class CheckoutController extends Controller
{
    public function getCheckout()
    {
       // $grandTotal = $request->input('grandTotal');
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $items = json_decode($cookie_data, true);
        $grandTotal=0;
        $itemCount = 0;
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
            }
        }
        return view('welcome');
    }
}
