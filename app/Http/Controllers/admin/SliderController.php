<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.slider.index')->withsliders($sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'              =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'link'               =>  'nullable|url',
            'slider_title'       =>  'required|max:60',
            'short_description'  =>  'required|max:200',
        ],[
            'slider_title.required' => 'Please Enter Slider Title',
            'link.required'         => 'Please Enter Slider Know More Link',
            'short_description.required' => 'Please Enter Short Description', 
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/slider/',$file, $image);
        }
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $slider = new Slider;
        $slider->create([
            'image'             =>  $image,
            'link'              =>  $request->link,
            'slider_title'      =>  $request->slider_title,
            'short_description' => $request->short_description,
            'slug'                  =>  $request->slug,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);

        return redirect()->route('slider.index')->with('success','Slider added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit')->withslider($slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'image'             =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'link'              =>  'nullable|url',
            'slider_title'       =>  'required|max:60',
            'short_description'  =>  'required|max:200',
        ],[
            'slider_title.required' => 'Please Enter Slider Title',
            'link.required'         => 'Please Enter Slider Know More Link',
            'short_description.required' => 'Please Enter Short Description',
            'slider_title.required'  => 'The Slider Title must not be greater than 120 characters'     
        ]);

        $slider = Slider::find($id);

        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/slider/',$file, $image);
            $slider->update([
                'image' =>  $image,
            ]);
        }

        $slider->update([
            'link'              =>  $request->link,
            'slider_title'      =>  $request->slider_title,
            'short_description' => $request->short_description,
            'slug'              => $request->slug,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'og_title'          => $request->og_title,
            'og_image_alt'      => $request->og_image_alt,
            'og_description'    => $request->og_description,
        ]);
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $slider->update([
                'og_image' =>  $document,
            ]);
        }

        return redirect()->route('slider.index')->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->where('id',$id)->delete();
        return redirect()->back()->with('danger','Slider Deleted Successfully');
    }
}
