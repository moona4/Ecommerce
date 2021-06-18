<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('back.dashboard.payments.index', compact('payments'));
    }

    public function changePaymentStatus($id, $status)
    {
        $payments = Payment::find($id);
        $payments->status = $status;
        $payments->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.dashboard.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required|string",
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "status" => "required|string"
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'images/payments/' . time() . '.' . $extension;
        $file->move('public/images/payments', $filename);

        $payments = new Payment([
            'type' => $request->get('type'),
            'image' => $filename,
            'status' => $request->get('status'),
        ]);

        $payments->save();
        return back()->with('success', 'Payment created successfully');
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
        //
    }
}
