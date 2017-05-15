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
      return view('admin.activities.edit')
          ->with('activity', \App\Activity::find($id))
          ->with('users', \App\User::all())
          ->with('section','actividades');
    }


    public function update(Request $request, $id)
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

      \App\Activity::find($id)->update($request->all());
      return redirect('/activities');
    }


    public function destroy($id)
    {
      \App\Activity::destroy($id);
      return redirect('/activities');
    }

    public function listActivityAssistance()
    {
      $activities = \App\Activity::orderBy('init_date', 'desc')->get();

      $activitiesAssigned = $activities->filter(function ($activity) {
          return $activity->isAssigned();
      });

      $activitiesUnAssigned = $activities->filter(function ($activity) {
          return !$activity->isAssigned();
      });

      return view('admin.activities.activity_assistance')
          ->with('activitiesassigned', $activitiesAssigned)
          ->with('activitiesunAssigned', $activitiesUnAssigned)
          ->with('users', \App\User::all())
          ->with('section', 'actividades');

    }

    public function editActivityAssistance($id)
    {
      $activity = \App\Activity::find($id);
      $user_registers = $activity->users;
      $users = \App\User::all();
      $diff = $users->diff($user_registers);
      $user_no_registers = $diff->all();
      //dd($diff);
      return view('admin.activities.edit_activity_assistance')
          ->with('users_reg', $user_registers)
          ->with('users_noreg', $diff)
          ->with('activity', $activity)
          ->with('section', 'actividades');
    }

    public function saveActivityAssistance(Request $request)
    {
      $activity = \App\Activity::find($request->activity_id);

      if($activity->users)
      {
          $activity->users()->detach();
      }

      $activity->users()->attach($request->to);
      return redirect('/activities_assistance');

    }
}
