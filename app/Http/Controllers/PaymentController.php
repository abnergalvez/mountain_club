<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index')
        ->with('payments', \App\Payment::all())
        ->with('users',\App\User::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      \App\Payment::create($request->all());
      return redirect('/payments');
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
      \App\Payment::destroy($id);
      return redirect('/payments');
    }
}
