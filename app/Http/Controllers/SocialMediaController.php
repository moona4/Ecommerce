<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_media=SocialMedia::all();
        return view('back.dashboard.socialMedia.index',compact('social_media'));
    }

    public function changeMediaStatus($id, $status){
        $social_media =SocialMedia::find($id);
        $social_media->status=$status;
        $social_media->save();
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('back.dashboard.socialMedia.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "type" => "required|string",
            "link" => "required|string",
            "status" => "required|string"
        ]);


        $social_media =new SocialMedia([
        'type' => $request -> get('type'),
        'link' => $request -> get('link'),
        'status' => $request ->get('status'),
        ]);
        
        $social_media->save();
        return back()->with('success','SocialMedia created successfully');
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
