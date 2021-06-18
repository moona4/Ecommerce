<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\DeliveryAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('front.pages.Profile');
    }
    public function editProfile($id)
    {
        $profile = Auth::guard('customer')->user();
        return view('front.pages.profile', compact('profile'));
    }
    public function updateProfile(Request $request)
    {
        $profile = Customer::find(Auth::guard('customer')->user()->id);

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->display_name = $request->first_name . ' ' . $request->last_name;
        $profile->mobile_no = $request->mobile_no;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->update();
        return redirect()->back();
    }


    public function getAddress()
    {
        $deliveryAddresses = Auth::guard('customer')->user()->deliveryAddresses;
        return view('front.pages.Address', compact('deliveryAddresses'));
    }

    public function getWishlist()
    {
        return view('front.pages.Wishlist');
    }
    public function getOrderlist()
    {
        $orders = Auth::guard('customer')->user()->orders;
        if (count($orders))
            foreach ($orders as  $order) {
                $order->items = $order->orderItems;
                $order->order_date_time = $order->created_at->format('D, jS M, Y h:i A');
                $order->ordered_at = $order->created_at->diffForHumans();
                foreach ($order->items as $item) {
                    $item->name = $item->product['name'];
                    unset($item->product, $item->created_at, $item->updated_at);
                }
            }
        $countOrders = count($orders);
        return view('front.pages.orderlist', compact('orders', 'countOrders'));
    }

    public function getOrderItems($orderId)
    {
        // $orderItems = Auth::guard('customer')->user()->orders->get(['product_id', 'quantity', 'price', 'amount']);
        $orderItems = OrderItem::whereOrderId($orderId)->get(['product_id', 'quantity', 'price', 'amount']);
        foreach ($orderItems as $item) {
            $item->name = $item->product['name'];
            unset($item->product_id, $item->product);
        }
        return response([
            'success' => true,
            'data' => $orderItems,
        ], 200);
    }
    public function editAddress($id)
    {
        $deliveryAddress = DeliveryAddress::find($id);
        return $deliveryAddress;
    }
    public function updateAddress(Request $request,$id)
    {
        $deliveryAddresses = DeliveryAddress::find($id);
        $deliveryAddresses->delivery_area = $request->delivery_area;
        $deliveryAddresses->complete_address = $request->complete_address;
        $deliveryAddresses->contact_no = $request->contact_no;

        $deliveryAddresses->update();
        return redirect()->back();
    }
    public function delete($id)
    {

        $deliveryAddress = DeliveryAddress::find($id);
        $deliveryAddress->delete();
        return redirect()->back();
        // return response()->json([
        //     'message' => 'Data deleted successfully!'
        // ]);
    }
}
