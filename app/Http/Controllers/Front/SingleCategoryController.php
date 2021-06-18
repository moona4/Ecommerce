<?php

namespace App\Http\Controllers\Front;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingleCategoryController extends Controller
{
    public function viewCategory($id){
        $categories=Category::find($id);
        $cuisines = Product::whereStatus(1)->get()->take(8);
        // foreach ($categories as $key => $category) {
        //     $category->no_of_items = count($category->products);
        //     unset($category->products);
        // }
        return view('front.pages.singleCategory',compact('categories','cuisines'));

    
}
}