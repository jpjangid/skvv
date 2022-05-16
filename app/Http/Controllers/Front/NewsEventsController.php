<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\NewsEvents;
use Illuminate\Http\Request;

class NewsEventsController extends Controller
{
    public function index()
    {
        $news = NewsEvents::select('heading','slug','img_url')->where(['flag' => 0])->where('display_date','<=',date('Y-m-d'))->get(); 
        return view('front.news_events.index',compact('news'));
    }

    public function getNews($news)
    {
        $news = NewsEvents::where(['flag' => 0,'slug' => $news])->first();
        if(empty($news)) {
            return redirect()->back();
        }
        return view('front.news_events.detail',compact('news'));
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
        //
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
        //
    }
}
