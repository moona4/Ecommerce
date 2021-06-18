<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryAddressController extends Controller
{
    public function getDeliveryAddress(){
        $deliveryAddresses = Auth::guard('customer')->user()->deliveryAddresses;
            return view('front.pages.address',compact('deliveryAddresses'));
    }
}
