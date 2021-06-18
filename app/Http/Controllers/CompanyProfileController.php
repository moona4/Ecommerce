<?php

namespace App\Http\Controllers;

use App\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyProfiles = CompanyProfile::all();
        return view('back.dashboard.companyProfile.index', compact('companyProfiles'));
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
        // $this->validate($request, [
        //     "name" => "required|string",
        //     "pan_vat_no"=>"requirde|string",
        //     "email" => "required|email",
        //     "address"=>"required|string",
        //     "phone_no"=>"requirde|string",
        //     "mobile_no" => "required|integer",
        //     "website"=>"requirde|string",
        //     "latitude"=>"requirde|string",
        //     "longitude"=>"requirde|string"
        // ]);

        // if (CompanyProfile::create($request->all()))
        //     return back()->with('successMsg', 'contact created successfully');
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
        $companyProfiles = CompanyProfile::find($id);
        return view('back.dashboard.companyProfile.edit', compact('companyProfiles'));
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
        $companyProfiles = CompanyProfile::find($id);
        $update_companyProfile = array(
            'name' => $request->name,
            'pan_vat_no' => $request->pan_vat_no,
            'email' => $request->email,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'mobile_no'=>$request->mobile_no,
            'website'=>$request->website,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
        );

        $companyProfiles->update($update_companyProfile);
        return redirect('admin/companyprofile');
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
