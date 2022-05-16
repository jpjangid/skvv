<?php

namespace App\Http\Controllers\admin;

use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquires = Enquiry::where('flag',0)->get();
        return view('admin.enquiry.index',compact('enquires'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $enquiry = Enquiry::find($id);
        if(empty($enquiry)){
            return redirect('404');
        }

        return view('admin.enquiry.show',compact('enquiry'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->flag = 1;
        $enquiry->save();
        return redirect()->back()->with('success','Enquiry deleted successfully');
    }
}
