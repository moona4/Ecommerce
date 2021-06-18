<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('back.dashboard.faqs.index', compact('faqs'));
    }

    public function changeFaqStatus($id, $status)
    {
        $faq = FAQ::find($id);
        $faq->status = $status;
        $faq->save();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email",
            "mobile_no" => "required|integer",
            "question" => "required|string"
        ]);

        if (FAQ::create($request->all()))
            return back()->with('successMsg', 'faq created successfully');
    }

    public function destroy($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        return redirect()->back();
    }
}
