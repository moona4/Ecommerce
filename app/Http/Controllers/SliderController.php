<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\SLider;

use Illuminate\Http\Request;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        foreach ($sliders as $key => $slider) {
            $slider->expires_on = Carbon::parse($slider->expires_on)->isoFormat('Do MMM, YYYY');
        }
        return view('back.dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'images/sliders/' . time() . '.' . $extension;
        $file->move('public/images/sliders', $filename);

        $sliders = new Slider([
            'title' => $request->get('title'),
            'image' => $filename,
            'type' => $request->get('type'),
            'expires_on' => $request->get('expires_on'),
            'status' => $request->get('status'),
        ]);
        if ($sliders->save())
            return back()->with('successMsg', 'slider created successfully');
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
        $slider = Slider::find($id);
        return view('back.dashboard.sliders.edit', compact('slider'));
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
        $slider = Slider::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'images/sliders/' . time() . '.' . $extension;
            $file->move('public/images/sliders', $filename);
            $update_slider = array(
                'title' => $request->title,
                'image' => $filename,
                'type' => $request->type,
                'expires_on' => $request->expires_on,
                'status' => $request->status

            );
        } else {
            $update_slider = array(
                'title' => $request->title,
                'type' => $request->type,
                'expires_on' => $request->expires_on,
                'status' => $request->status
            );
        }
        $slider->update($update_slider);
        return redirect('admin/sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back();
    }
}
