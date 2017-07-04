<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        return view('admin.galleries.index')->with('galleries',\App\Gallery::all());
    }


    public function store(Request $request)
    {
        $photo_name = $request->file('photo_')->getClientOriginalName();
        $request->file('photo_')->move( base_path() . '/public/img/galleries', $photo_name);
        $request->request->add(['photo' => $photo_name]);
        \App\Gallery::create($request->all());
        return redirect('/galleries');
    }


    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit')->with('gallery', $gallery);
    }


    public function update(Request $request, Gallery $gallery)
    {
        if($request->photo_)
        {
            $photo_name = $request->file('photo_')->getClientOriginalName();
            $request->file('photo_')->move( base_path() . '/public/img/galleries', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => $gallery->photo]);
        }

        $gallery->update($request->all());
        return redirect('/galleries');
    }


    public function destroy(Gallery $gallery)
    {
        $path = '/public/img/galleries/';
        \File::delete($path.$gallery->photo);
        $gallery->delete();
        return redirect('/galleries');
    }
}
