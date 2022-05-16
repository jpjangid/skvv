<?php

namespace App\Http\Controllers\admin;

use App\Models\Video;
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

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::where('flag','0')->with('category')->get();
        return view('admin.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('flag',0)->select('name','id')->get();
        return view('admin.video.create',compact('categories'));
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
            'video'                 =>  'required|mimes:mp4,mov,ogg',
            'link'                  =>  'nullable|url',
        ],[
            'video.required'        =>  'Please select a video'
        ]);

        $video = "";
        if($request->hasFile('video')){
            $extension = $request->file('video')->extension();
            $file = $request->file('video');
            $fileNameString = (string) Str::uuid();
            $video = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/video/',$file, $video);
        }

        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $video = Video::create([
            'category_id'           =>  $request->category_id,
            'video'                 =>  $video,
            'link'                  =>  $request->link,
            'short_des'             =>  $request->short_des,
            'slug'                  =>  $request->slug,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);

        return redirect()->route('video.index')->with('success','Video Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select('id','name')->get();
        $video = Video::find($id);
        return view('admin.video.edit',compact('categories','video'))->withcategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'video'                 =>  'nullable|mimes:mp4,mov,ogg',
            'link'                  =>  'nullable|url',
        ],[
            'video.required'        =>  'Please select a video'
        ]);

        // $video = "";
        // if($request->hasFile('video')){
        //     $extension = $request->file('video')->extension();
        //     $file = $request->file('video');
        //     $fileNameString = (string) Str::uuid();
        //     $video = $fileNameString.time().".".$extension;
        //     $path = Storage::putFileAs('public/video/',$file, $video);
        // }
      

        $video = Video::find($id);
        $video->category_id           = $request->category_id;
        $video->link                  = $request->link;
        $video->short_des             = $request->short_des;
        $video->slug                  =  $request->slug;
        $video->meta_title            =  $request->meta_title;
        $video->meta_keyword          =  $request->meta_keyword;
        $video->meta_description      =  $request->meta_description;
        $video->og_title              =  $request->og_title;
        $video->og_image_alt          =  $request->og_image_alt;
        $video->og_description        =  $request->og_description;
        $video->save();

        // if(!empty($video)) {
        //     $video->update([
        //         'video' =>  $video
        //     ]);
        // }

        if($request->hasFile('video')){
            $extension = $request->file('video')->extension();
            $file = $request->file('video');
            $fileNameString = (string) Str::uuid();
            $video = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/video/',$file, $video);
            $video->update([
                'video' =>  $video,
            ]);
        }
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $video->update([
                'og_image' =>  $document,
            ]);
        }

        return redirect()->route('video.index')->with('success','Video Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->flag = '1';
        $video->update();
        return redirect()->back()->with('danger','Video Deleted Successfully');
    }
}
