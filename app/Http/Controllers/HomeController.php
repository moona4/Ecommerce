<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories')->count();
        $products = DB::table('products')->count();
        $users = DB::table('customers')->count();
        $orders = DB::table('orders')->count();
        return view('back.dashboard.index', compact(['categories', 'products', 'users', 'orders']));
    }
}
