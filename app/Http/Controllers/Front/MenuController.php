<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class MenuController extends Controller
{
    public function getMenu()
    {
        $categories = Category::all();
        foreach ($categories as $key => $category) {
            $category->items = $category->products;
            unset($category->products);
        }
        
        return view('front.pages.menu',compact('categories'));

        // return response([
        //     'success' => true,
        //     'menu' => $categories
        // ], 200);

    }
    
}
