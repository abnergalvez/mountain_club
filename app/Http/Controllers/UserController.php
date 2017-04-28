<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index')->with('users',\App\User::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = new \App\User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->club_position = $request->club_position;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/users');
    }


    public function show($id)
    {
        return view('admin.users.show')->with('user', \App\User::find($id));
    }


    public function edit($id)
    {
        return view('admin.users.edit')->with('user', \App\User::find($id));
    }


    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->club_position = $request->club_position;
        $user->email = $request->email;
        $user->role = $request->role;
        if(trim($request->password) != '')
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('/users');
    }


    public function destroy($id)
    {
        \App\User::destroy($id);
        return redirect('/users');
    }

    public function updateProfile(Request $request)
    {
        return redirect('/users');
    }

}
