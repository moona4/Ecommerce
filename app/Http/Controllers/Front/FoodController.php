<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function categoryWiseFood($category_slug)
    {
        $foodData = array();
        $foodData['category_name'] = Category::whereSlug($category_slug)->pluck('name')[0];

        $foods = Product::whereHas('category', function ($q) use ($category_slug) {
            $q->whereSlug($category_slug);
        })->whereStatus(1)->get();
        foreach ($foods as $key => $food) {
            unset($foods[$key]->category);
            $reviews = $food->reviews;
            $foods[$key]->count_reviews = count($reviews);
            foreach ($reviews as $review_key => $review) {
                $reviews[$review_key]->rating = $review->rating;
                unset($reviews[$review_key]->id);
                unset($reviews[$review_key]->product_id);
                unset($reviews[$review_key]->created_at);
                unset($reviews[$review_key]->updated_at);
            }
        }
        $foodData['foods'] = $foods;
        $categories = Category::all();
        return view('front.pages.categorywisefoods', compact('foodData','categories'));
    }
   
}
