<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('admin.info_club.index')
        ->with('club',\App\Site::first())
        ->with('section','club');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        if($request->club_logo)
        {
            $photo_name = $request->file('club_logo')->getClientOriginalName();
            $request->file('club_logo')->move( base_path() . '/public/img/site', $photo_name);
            $request->request->add(['logo' => $photo_name]);
        }
        else
        {
            $request->request->add(['logo' => 'sin_foto']);
        }

        \App\Site::create($request->all());
        return redirect('/info_club');
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
        if($request->club_logo)
        {
            $photo_name = $request->file('club_logo')->getClientOriginalName();
            $request->file('club_logo')->move( base_path() . '/public/img/site', $photo_name);
            $request->request->add(['logo' => $photo_name]);
        }

        \App\Site::find($id)->update($request->all());
        return redirect('/info_club');
    }


    public function destroy($id)
    {
        //
    }
}
