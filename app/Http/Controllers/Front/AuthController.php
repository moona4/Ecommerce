<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Model\Authenticator;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
     * @var Authenticator
     */
    private $authenticator;

    public function __construct(Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    /**
     * @param Request $request
     * @return array
     * @throws AuthenticationException
     */

     

    public function login(ApiLoginRequest $request)
    {
        $credentials = array_values($request->only('username', 'password'));

        if (!$user = $this->authenticator->attempt(...$credentials, ...['users'])) {
            throw new AuthenticationException();
        }

        $api_token = $user->createToken($user->display_name)->accessToken;

        return response([
            'success' => true,
            'message' => 'Logged In Successfully !',
            'api_token' => $api_token,
            'user_info' => $user
        ], 200);
    }

    /**
     * @param Request $request
     * @return array
     * @throws AuthenticationException
     */
    public function customerLogin(Request $request)
    {
        $credentials = array_values($request->only('username', 'password'));
        if (!$customer = $this->authenticator->attempt(...$credentials, ...['customers'])) {
            throw new AuthenticationException();
        }
        if ($customer->status) {
            // dd('Logged In Successfully !');
            $api_token = $customer->createToken($customer->display_name)->accessToken;
            return response([
                'success' => true,
                'message' => 'Logged In Successfully !',
                'api_token' => $api_token,
                'customer_info' => $customer
            ], 200);
        } else {
            return response([
                'success' => true,
                'message' => 'Verify to start the session !',
                'customer_info' => $customer
            ], 200);
        }
    }

    public function isCustomerAuthenticated()
    {
        return response([
            'success' => true,
            'customer_info' => Auth::user()
        ], 200);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->revokeTokens();
        return response([
            'success' => true,
            'message' => 'Logged Out Successfully !'
        ], 200);
    }

    public function customerLogout()
    {
        $customer = Auth::user();
        $customer->revokeTokens();
        return response([
            'success' => true,
            'message' => 'Logged Out Successfully !'
        ], 200);
    }
}
