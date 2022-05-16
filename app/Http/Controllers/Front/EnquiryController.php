<?php

namespace App\Http\Controllers\Front;

use App\Models\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    { 
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255',
            'mobile'    => 'required|numeric|digits:10',
            'message'   => 'required'  
        ],[ 
            'name.required'     =>  'Name is required',
            'name.max'          =>  'Name must be under 255 characters',
            'email.required'    =>  'Email is required',
            'email.email'       =>  'Please check your Mail address',
            'email.max'         =>  'Mail address must be under 255 characters', 
            'mobile.required'   =>  'Mobile no is required',
            'mobile.numeric'    =>  'Mobile must be numeric',
            'mobile.digits'     =>  'Mobile no must be of 10 digits',
            'message.required'  =>  'Message is required'  
        ]);

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->mobile = $request->mobile;
        $enquiry->message = $request->message;
        $enquiry->save();
        return redirect()->back()->with('success','Your Enquiry has been submited successfully.'); 
    }

    public function show(Enquiry $enquiry)
    {
        //
    }

    public function edit(Enquiry $enquiry)
    {
        //
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
