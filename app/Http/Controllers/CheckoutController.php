<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {

        $order = Order::create([
            'userId' => $request->user()->getId(),
            'grandTotal'=>3000,
            'itemCount'=>2
        ]);
        if($order){
            $items = collect(['productId'=>1,'quantity'=>1,'price'=>75,'size'=>'small'],
            ['productId'=>2,'quantity'=>1,'price'=>89,'size'=>'small']);

            foreach($items as $item){
                $orderItem = new OrderItem([
                    'productId'=> $item->productId,
                    'quantity'=>$item->quantity,
                    'price'=>$item->price,
                    'size'=>$item->size
                ]);
                $order->items()->save($orderItem);
            }
        }
        return view('welcome');
    }
}
