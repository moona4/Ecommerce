<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\CompanyProfile;
use App\FAQ;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Product;
use App\Slider;
use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Get Categories
        $categories = Category::all();
        foreach ($categories as $key => $category) {
            $category->no_of_items = count($category->products);
            unset($category->products);
        }

        // Get Products
        $popularCuisines = Product::whereStatus(1)->orderByDesc('rank')->get()->take(8);;
        $randomCuisines = Product::whereStatus(1)->inRandomOrder()->get()->take(8);
        $cuisines = Product::whereStatus(1)->get()->take(8);
        // $products = Product::whereStatus(1)->get()->take(5);

        //Get Sliders
        $sliders = Slider::whereStatus(1)->get()->take(3);
        // dd($sliders);
        return view('front.pages.index', compact(['categories', 'popularCuisines', 'randomCuisines', 'cuisines', 'sliders']));
    }

    public function getCategory()
    {
        $categories = Category::get();
        return view('front.pages.categories', compact('categories'));
    }

    public function getProductData()
    {
        $products = Product::get();
        return view('front.pages.products', compact('products'));
    }

    // Get payments
    public function getPayments()
    {
        $payments = Payment::whereStatus(1)->get();
        return $payments;
    }

    // Get socialmedia
    public function getSocialMedia()
    {
        $socialmedias = SocialMedia::whereStatus(1)->get();
        return $socialmedias;
    }

    public function aboutUs()
    {
        return view('front.pages.aboutUs');
    }

    public function contactUs()
    {
        $companyProfile= CompanyProfile::first();
        return view('front.pages.contact',compact('companyProfile'));
    }

    public function faqs()
    {
        $faqs = FAQ::whereStatus(1)->get()->take(8);
        return view('front.pages.faq', compact('faqs'));
    }
}
