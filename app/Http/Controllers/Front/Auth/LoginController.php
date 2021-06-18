<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (auth()->guard('customer')->attempt(request(['mobile_no', 'password']))) {
            return redirect($this->redirectTo);
        } else
            return redirect()->back()->withErrors(['msg' => "Invalid Credentials."])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return redirect($this->redirectTo);
    }
}
