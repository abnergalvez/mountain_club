<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index')->with('contacts',\App\Contact::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        \App\Contact::create($request->all());
        return redirect('/');
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
