<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SearchController extends Controller
{
    public function searchFoods(Request $request)
    {
        $filter = $request->filter;
        $foods = Product::whereStatus(1)->where('name', 'LIKE', '%' . $filter . '%')->get();
        $categories = Category::all();
        return view('front.pages.searchfoods',compact('foods','categories','filter'));
    }
}
