<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index')->with('news', \App\News::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        $new = new \App\News;
        $new->date = $request->date;
        $new->author = $request->author;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->video = $request->video;

        if($request->photo)
        {
            $photo_name = $request->title.''.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move( base_path() . '/public/img/news', $photo_name);
            $new->photo = $photo_name;
        }
        $new->save();
        return redirect('/news');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.news.edit')->with('new', \App\News::find($id));
    }


    public function update(Request $request, $id)
    {
        $new = \App\News::find($id);
        $new->date = $request->date;
        $new->author = $request->author;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->video = $request->video;

        if($request->photo)
        {
            $photo_name = $request->title.''.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move( base_path() . '/public/img/news', $photo_name);
            $new->photo = $photo_name;
        }
        $new->save();
        return redirect('/news');
    }


    public function destroy($id)
    {
        \App\News::destroy($id);
        return redirect('/news');
    }
}
