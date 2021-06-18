<?php

namespace App\Http\Controllers;

use App\Offer;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('back.dashboard.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.dashboard.offers.create');
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
            "name" => "required|string",
            "discount" => "required|string",
            "discount_type" => "required|string",
            "status" => "required|string"
        ]);

        $offers = new Offer([
            'name' => $request->get('name'),
            'discount' => $request->get('discount'),
            'discount_type' => $request->get('discount_type'),
            'status' => $request->get('status'),
        ]);

        $offers->save();
        return back()->with('successMsg', 'Offer created successfully');
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
        $offer = Offer::find($id);
        return view('back.dashboard.offers.edit', compact('offer'));
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
        $offer = Offer::find($id);
        $update_offer = array(
            'name' => $request->name,
            'discount' => $request->discount,
            'discount_type' => $request->discount_type,
            'status' => $request->status
        );

        $offer->update($update_offer);
        return redirect('admin/offers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->back();
    }
}
