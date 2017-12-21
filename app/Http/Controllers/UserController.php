<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index')
        ->with('users',\App\User::all())
        ->with('section','socios');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $users = \App\User::all();
        if($users->count() > 0)
        {
            $order =   $users->max('order') + 1;
        }
        else
        {
            $order =  1;
        }


        $user = new \App\User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->club_position = $request->club_position;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->order = $order;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/users');
    }


    public function show($id)
    {
        return view('admin.users.show')
        ->with('user', \App\User::find($id))
        ->with('section','socios');
    }


    public function edit($id)
    {
        return view('admin.users.edit')
        ->with('user', \App\User::find($id))
        ->with('section','socios');
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

      $user = \App\User::find($request->user_id);
      $user->birthdate = $request->birthdate;
      $user->phone = $request->phone;
      $user->dni = $request->dni;
      $user->facebook_url = $request->facebook_url;
      $user->profession = $request->profession;
      $user->blood_type = $request->blood_type;
      $user->health_problems = $request->health_problems;
      $user->experience = $request->experience;
      $user->training = $request->training;
      $user->own_equipment = $request->own_equipment;

      if($request->photo)
      {
          $photo_name = $user->name.''.$request->file('photo')->getClientOriginalName();
          $request->file('photo')->move( base_path() . '/public/img/profile', $photo_name);
          $user->photo = $photo_name;
      }

      $user->save();

        if(\Auth::user()->role == 'admin')
        {
            return redirect('/users');
        }
        else
        {
            return redirect('/profile_member');
        }

    }

    public function getSuggestions()
    {
      $user=\Auth::user();
        return view('admin.suggestions.mysuggestions')->with('suggestions',$user->suggestions)->with('user',$user);
    }

    public function getPayments()
    {
        $user=\Auth::user();
        return view('admin.payments.mypayments')->with('payments',$user->payments);
    }

    public function getProfile()
    {
        return view('admin.users.myprofile')->with('user',\Auth::user());
    }

    public function getAssistance()
    {
        return view('admin.meetings.myassistance')
            ->with('meetings',\App\Meeting::All())
            ->with('user',\Auth::user());
    }

    public function getLendEquipment()
    {

      $user = \Auth::user();
      $equipment_registers = $user->equipments;
      return view('admin.equipment.mylendequipment')
          ->with('equipments',$equipment_registers)
          ->with('user',\Auth::user());
    }

    public function getActivitiesAssistance()
    {
      return view('admin.activities.myactivityassistance')
          ->with('activities',\App\Activity::All())
          ->with('user',\Auth::user());
    }

    public function changeOrder($id, $up_down)
    {
        $user = \App\User::find($id);
        $original_order = $user->order;
        $users = \App\User::all();

        if($up_down == 'down')
        {
            $user_tmp = $users->where('order','=',$user->order + 1)->first();
        }

        if($up_down == 'up')
        {
            $user_tmp = $users->where('order','=',$user->order - 1)->first();
        }

        if(isset($user_tmp->id))
        {
            $user2 = \App\User::find($user_tmp->id);
            $user->order = $user2->order;
            $user2->order = $original_order;
            $user->save();
            $user2->save();

        }
        return redirect('/users');
    }

}
