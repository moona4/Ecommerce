<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function ViewProduct($id){
        $products=Product::find($id);
        return view('front.pages.singleProduct',compact('products'));
    }

}
