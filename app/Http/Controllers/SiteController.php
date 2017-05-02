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
        \App\Site::find($id)->update($request->all());
        return redirect('/info_club');
    }


    public function destroy($id)
    {
        //
    }
}
