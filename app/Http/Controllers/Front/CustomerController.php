<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        $display_name = $request->first_name . ' ' . $request->last_name;
        $otp = rand(100000, 999999);
        if ($this->checkValidation($request)) {
            $customer = new Customer([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_no' => $request->mobile_no,
                'password' => bcrypt($request->password),
                'display_name' => $display_name,
                'otp' => $otp
            ]);
            if ($customer->save()) {
                Auth::guard('customer')->login($customer);
                function sendSMS($content)
                {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://bulksms.nctbutwal.com.np/api/v3/sms?");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = curl_exec($ch);
                    curl_close($ch);
                    return $server_output;
                }
                $token = 'ivDlDv4WndMITrbJ1354FeeAWeaIpiE3obZW';
                $to = $customer->mobile_no;
                $sender = "Aayokhana";
                $message = 'Dear ' . $request->first_name . ',' . $otp . ' is your OTP for Aayokhana.';
                $content = [
                    'token' => rawurlencode($token),
                    'to' => rawurlencode($to),
                    'sender' => rawurlencode($sender),
                    'message' => wordwrap($message),
                ];

                sendSMS($content);
                return back()->with('success', 'Registered successfully');
            } else {
            }
        } else {
            return response(["Something went wrong"]);
        }
    }
    private function checkValidation($request)
    {
        $status = false;
        $customer = Customer::whereMobileNo($request->mobile_no);
        if ($customer->count())
            $status = false;
        if ($request->password === $request->password_confirmation)
            $status = true;
        return $status;
    }

    public function showVerify()
    {
        return view('front.pages.verify');
    }

    public function verify(Request $request)
    {
        $selectedCustomer = Customer::whereOtp($request->otp);
        if ($selectedCustomer->exists()) {
            $customer = $selectedCustomer->first();
            $customer->status = 1;
            if ($customer->update()) {
                return response([
                    'success' => true,
                    'message' => 'Successfully Verified.'
                ], 200);
            }
        } else {
            return response([
                'success' => false
            ], 403);
        }
    }
}
