<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DeliveryAddress;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('back.dashboard.customers.index', compact('customers'));
    }

    public function changeCustomerStatus($id, $status)
    {
        $customers = Customer::find($id);
        $customers->status = $status;
        $customers->save();
    }

    public function getDeliveryAddresses($customerId)
    {
        $customer = Customer::find($customerId);
        $deliveryAddresses = $customer->deliveryAddresses;
        foreach ($deliveryAddresses as $key => $address) {
            $address->display_name = $address->customer->display_name;
        }
        return response([
            'success' => true,
            'data' => $deliveryAddresses,
            'customer_name'=>$customer->display_name
        ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $display_name = $request->first_name . ' ' . $request->last_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back();
    }
}
