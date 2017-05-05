<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('admin.activities.index')
            ->with('activities', \App\Activity::all())
            ->with('users', \App\User::all())
            ->with('section','actividades');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if($request->photo_activity)
        {
            $photo_name = $request->name.$request->name.'.jpg';
            $request->file('photo_activity')->move( base_path() . '/public/img/activities', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => '-']);
        }

        \App\Activity::create($request->all());
        return redirect('/activities');
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

    public function listActivityAssistance()
    {

    }

    public function editActivityAssistance($id)
    {

    }

    public function saveActivityAssistance(Request $request)
    {

    }
}
