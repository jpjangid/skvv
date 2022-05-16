<?php


namespace App\Http\Controllers\admin;

use App\Models\alumnispeak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlumnispeakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnispeaks = alumnispeak::where(['flag'=> '0','status'=> '0'])->get();
        // dd($alumnispeaks);
        return view('admin.alumnispeak.index',compact('alumnispeaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnispeak.create');
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
            'name'        => 'required',
            'designation'     => 'required',
        ],[
            'name.required'        => 'Please Select College',
            'designation.required'     => 'Please Select Department',
        ]);
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $alumniimage = "";
        if($request->hasFile('alumni_image')){
            $extension = $request->file('alumni_image')->extension();
            $file = $request->file('alumni_image');
            $fileNameString = (string) Str::uuid();
            $alumniimage = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/alumni_image/',$file, $alumniimage);
        }
        alumnispeak::create([
            'name'              => $request->name,
            'designation'       => $request->designation,
            'description'       => $request->description,
            'alumni_image'      => $alumniimage,
            'slug'              => $request->slug,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'og_title'          => $request->og_title,
            'og_image_alt'      => $request->og_image_alt,
            'og_description'    => $request->og_description,
            'og_image'          => $document,
        ]);
        return redirect('admin/alumnispeak')->with('success','Addimmision Exam Addedd Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumnispeak  $alumnispeak
     * @return \Illuminate\Http\Response
     */
    public function show(alumnispeak $alumnispeak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumnispeak  $alumnispeak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $alumnispeak = alumnispeak::find($id);
       return view('admin.alumnispeak.edit',compact('alumnispeak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumnispeak  $alumnispeak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'        => 'required',
            'designation'     => 'required',
        ],[
            'name.required'        => 'Please Select College',
            'designation.required'     => 'Please Select Department',
        ]);

        alumnispeak::where('id',$id)->update([
            'name'              => $request->name,
            'designation'       => $request->designation,
            'description'       => $request->description,
            'slug'              => $request->slug,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'og_title'          => $request->og_title,
            'og_image_alt'      => $request->og_image_alt,
            'og_description'    => $request->og_description,
        ]);

        $alumnispeak = alumnispeak::find($id);
        
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $alumnispeak->update([
                'og_image' =>  $document,
            ]);
        }
        if($request->hasFile('alumni_image')){
            $extension = $request->file('alumni_image')->extension();
            $file = $request->file('alumni_image');
            $fileNameString = (string) Str::uuid();
            $alumni_image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/alumni_image/',$file, $alumni_image);
            $alumnispeak->update([
                'alumni_image' =>  $alumni_image,
            ]);
        }
        return redirect()->route('alumnispeak.index')->with('success','Alumni Speak Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumnispeak  $alumnispeak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumnispeak = alumnispeak::find($id);
        $alumnispeak->flag = '1';
        $alumnispeak->update();
        return redirect()->back()->with('danger','Alumni Speak Deleted Successfully');
    }
}
