<?php

namespace App\Http\Controllers\admin;

use App\Models\Photo;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RolePermission;
use App\Models\RoleHasPermission;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::where('flag','0')->with('category')->get();
        return view('admin.photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('admin.photo.create',compact('categories'));
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
            'image'                 =>  'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link'                  =>  'nullable|url',
        ],[
            'image.required'        =>  'Please select Photo'
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/photo/',$file, $image);
        }
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $photo = Photo::create([
            'category_id'           =>  $request->category_id,
            'image'                 =>  $image,
            'link'                  =>  $request->link,
            'short_des'             =>  $request->short_des,
            'slug'                  =>  $request->slug,
            'heading'               =>  $request->heading,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);

        return redirect()->route('photo.index')->with('success','Photo Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select('id','name')->get();
        $photo = Photo::find($id);
        return view('admin.photo.edit',compact('categories','photo'))->withcategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'image'                 =>  'required|image|mimes:jpeg,png,jpg,gif,svg',
        //     'link'                  =>  'nullable|url',
        // ],[
        //     'image.required'        =>  'Please select Photo'
        // ]);

        // $image = "";
        // if($request->hasFile('image')){
        //     $extension = $request->file('image')->extension();
        //     $file = $request->file('image');
        //     $fileNameString = (string) Str::uuid();
        //     $image = $fileNameString.time().".".$extension;
        //     $path = Storage::putFileAs('public/photo/',$file, $image);
        // }

            $photo = Photo::find($id);
            $photo->category_id           = $request->category_id;
            $photo->link                  = $request->link;
            $photo->short_des             = $request->short_des;
            $photo->slug                  =  $request->slug;
            $photo->heading               =  $request->heading;
            $photo->meta_title            =  $request->meta_title;
            $photo->meta_keyword          =  $request->meta_keyword;
            $photo->meta_description      =  $request->meta_description;
            $photo->og_title              =  $request->og_title;
            $photo->og_image_alt          =  $request->og_image_alt;
            $photo->og_description        =  $request->og_description;
            $photo->save();

        // if(!empty($image)) {
        //     $photo->update([
        //         'image' =>  $image
        //     ]);
        // }

        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/image/',$file, $image);
            $photo->update([
                'image' =>  $image,
            ]);
        }
        
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $photo->update([
                'og_image' =>  $document,
            ]);
        }

        return redirect()->route('photo.index')->with('success','photo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->flag = '1';
        $photo->update();
        return redirect()->back()->with('danger','Photo Deleted Successfully');
    }
}
