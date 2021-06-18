<?php

namespace App\Http\Controllers\Front;

use App\DeliveryAddress;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $order = $request->order;
        $deliveryAddress = $order['delivery_address'];
        $orderItem = $order['order_items'];

        DeliveryAddress::create([
            'customer_id' => $order['customer_id'],
            'contact_no' => $deliveryAddress['contact_no'],
            'delivery_area' => $deliveryAddress['delivery_area'],
            'complete_address' => $deliveryAddress['complete_address'],
            'delivery_instructions' => $deliveryAddress['delivery_instructions']

        ]);
        $createOrder = Order::create([
            'customer_id' => $order['customer_id'],
            'gross_amount' => $order['gross_amount'],
            'discount' => $order['discount'],
            'net_amount' => $order['net_amount']

        ]);
        foreach ($orderItem as $key => $item) {
            OrderItem::create([
                'order_id' => $createOrder->id,
                'product_id' => $item['id'],
                'store_id' => $item['store_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'amount' => $item['amount'],

            ]);
        }


        //  $deliveryAddress->save();
        return response(['success', 'order created successfully']);
    }
}
