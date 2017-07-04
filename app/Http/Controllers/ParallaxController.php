<?php

namespace App\Http\Controllers;

use App\Parallax;
use Illuminate\Http\Request;

class ParallaxController extends Controller
{

    public function index()
    {
        return view('admin.parallaxes.index')->with('parallaxes',\App\Parallax::all());
    }

    public function store(Request $request)
    {
        $photo_name = $request->file('photo_')->getClientOriginalName();
        $request->file('photo_')->move( base_path() . '/public/img/parallaxes', $photo_name);
        $request->request->add(['photo' => $photo_name]);
        \App\Parallax::create($request->all());
        return redirect('/parallaxes');
    }


    public function edit(Parallax $parallaxis)
    {
        return view('admin.parallaxes.edit')->with('parallax', $parallaxis);
    }

    public function update(Request $request, Parallax $parallaxis)
    {
        if($request->photo_)
        {
            $photo_name = $request->file('photo_')->getClientOriginalName();
            $request->file('photo_')->move( base_path() . '/public/img/parallaxes', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => $parallaxis->photo]);
        }

        $parallaxis->update($request->all());
        return redirect('/parallaxes');
    }


    public function destroy(Parallax $parallaxis)
    {
        $parallax->delete();
        return redirect('/parallaxes');
    }
}
