<?php

namespace App\Http\Controllers\admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('flag','0')->get();
        return view('admin.page.index')->withpages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'                 =>  'required|unique:pages',
            'description'           =>  'required',
            'slug'                  =>  'required|unique:pages',
            'featured_image'        =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ],[
            'title.required'        =>  'Please enter page title',
            'description.required'  =>  'Please enter page description',
            'slug.required'         =>  'Please enter slug',
            'featured_image.required'        =>  'Please enter featured image of page',
        ]);

        $featured_image = "";
        if($request->hasFile('featured_image')){
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/page/',$file, $featured_image);
        }
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $page = new Page;
        $page->create([
            'title'                 =>  $request->title,
            'slug'                  =>  $request->slug,
            'description'           =>  $request->description,
            'featured_image'        =>  $featured_image,
            'keywords'              =>  $request->keywords,
            'tags'                  =>  $request->tags,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);

        return redirect()->route('page.index')->with('success','Page Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit')->withpage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'                 =>  'required|unique:pages,title,'.$id,
            'description'           =>  'required',
            'slug'                  =>  'required|unique:pages,slug,'.$id,
            'featured_image'        =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ],[
            'title.required'        =>  'Please enter page title',
            'description.required'  =>  'Please enter page description',
            'slug.required'         =>  'Please enter slug',
        ]);

        $page = Page::find($id);
        if($request->hasFile('featured_image')){
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/page/',$file, $featured_image);
            $page->update([
                'featured_image' =>  $featured_image,
            ]);
        }

        $page = Page::find($id);
        $page->update([
            'title'                 =>  $request->title,
            'slug'                  =>  $request->slug,
            'description'           =>  $request->description,
            'keywords'              =>  $request->keywords,
            'tags'                  =>  $request->tags,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
        ]);
        
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $image_name = $file->getClientOriginalName();
            $featured_image = $image_name;
            $path = Storage::putFileAs('public/page/',$file, $image_name);
            $page->update(['featured_image' => $image_name]);
        }
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $page->update([
                'og_image' =>  $document,
            ]);
        }
        return redirect()->route('page.index')->with('success','Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->flag = '1';
        $page->update();
        return redirect()->back()->with('danger','Page Deleted Successfully');
    }

    // Update status
    public function updateStatus(Request $request)
    {
        $page = Page::findOrFail($request->page_id);
        $page->status = $request->status;
        $page->save();

        return response()->json(['message' => 'Page status updated successfully.']);
    }
}
