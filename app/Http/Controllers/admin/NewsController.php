<?php

namespace App\Http\Controllers\admin;

use App\Models\NewsEvents;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RolePermission;
use App\Models\RoleHasPermission;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsEvents::where('flag','0')->with('user','department')->get();
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deparments = Department::select('name','id')->get();
        return view('admin.news.create',compact('deparments'));
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
            'category'              =>  'required',
            'department_id'         =>  'required',    
            'heading'               =>  'required',
            'slug'                  =>  'required|unique:news_events,slug', 
            'image'                 =>  'nullable|mimes:jpeg,png,jpg,gif,svg',
            'document'              =>  'nullable|max:10000',
            'link'                  =>  'nullable|url',
            'short_des'             =>  'required',
            'display_date'          =>  'required',
            'last_date'             =>  'required' 
        ],[
            'heading.required'      =>  'Please enter a heading'
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/news/image/',$file, $image);
        }

        $document = "";
        if($request->hasFile('document')){
            $extension = $request->file('document')->extension();
            $file = $request->file('document');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/news/document/',$file, $document);
        }
        $og_image = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $og_image);
        }

        $news = new NewsEvents;
        $news->cat                  = $request->category;
        $news->deptid               = $request->department_id;
        $news->heading              = $request->heading;
        $news->slug                 = $request->slug;
        $news->img_url              = $image;
        $news->pic_url              = $document; 
        $news->desc                 = $request->short_des;
        $news->display_date         = $request->display_date;
        $news->last_date            = $request->last_date;
        $news->link_url             = $request->link;
        $news->user_id              = auth()->user()->id;
        $news->meta_title          =  $request->meta_title;
        $news->meta_keyword        =  $request->meta_keyword;
        $news->meta_description    =  $request->meta_description;
        $news->og_title            =  $request->og_title;
        $news->og_image_alt        =  $request->og_image_alt;
        $news->og_description      =  $request->og_description;
        $news->og_image            =  $og_image;
        $news->save();

        return redirect()->route('news.index')->with('success','News & Event Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(NewsEvents $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deparments = Department::select('name','id')->get();
        $news = NewsEvents::find($id);
        return view('admin.news.edit',compact('deparments','news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'              =>  'required',
            'department_id'         =>  'required',    
            'heading'               =>  'required',
            'slug'                  =>  'required|unique:news_events,slug,'.$id, 
            'image'                 =>  'nullable|mimes:jpeg,png,jpg,gif,svg',
            'document'              =>  'nullable|max:10000',
            'link'                  =>  'nullable|url',
            'short_des'             =>  'required',
            'display_date'          =>  'required',
            'last_date'             =>  'required' 
        ],[
            'heading.required'      =>  'Please enter a heading'
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/news/image/',$file, $image);
        }

        $document = "";
        if($request->hasFile('document')){
            $extension = $request->file('document')->extension();
            $file = $request->file('document');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/news/document/',$file, $document);
        }

        $news = NewsEvents::findOrFail($id);
        $news->cat                  = $request->category;
        $news->deptid               = $request->department_id;
        $news->heading              = $request->heading;
        if(!empty($image)) {
            $news->img_url = $image;
        }
        if(!empty($document)){
            $news->pic_url = $document; 
        }
        $news->desc                  = $request->short_des;
        $news->display_date          = $request->display_date;
        $news->last_date             = $request->last_date;
        $news->link_url              = $request->link;
        $news->slug                  = $request->slug;
        $news->user_id               = auth()->user()->id;
        $news->meta_title            =  $request->meta_title;
        $news->meta_keyword          =  $request->meta_keyword;
        $news->meta_description      =  $request->meta_description;
        $news->og_title              =  $request->og_title;
        $news->og_image_alt          =  $request->og_image_alt;
        $news->og_description        =  $request->og_description;
        $news->save();

        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $news->update([
                'og_image' =>  $document,
            ]);
        }

        return redirect()->route('news.index')->with('success','News Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = NewsEvents::find($id);
        $news->flag = '1';
        $news->update();
        return redirect()->back()->with('danger','news Deleted Successfully');
    }
}
