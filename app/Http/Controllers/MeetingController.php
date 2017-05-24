<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = \App\Meeting::orderBy('date', 'desc')->get();
        return view('admin.meetings.index')
                ->with('meetings', $meetings)
                ->with('users', \App\User::all())
                ->with('section', 'reuniones');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $meeting = new \App\Meeting;
        $meeting->date = $request->date;
        $meeting->place = $request->place;
        $meeting->attendant = $request->attendant;
        if($request->photo)
        {
            $photo_name = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move( base_path() . '/public/img/meetings', $photo_name);
            $meeting->photo = $photo_name;
        }
        $meeting->save();
        return redirect('/meetings');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.meetings.edit')
                ->with('meeting', \App\Meeting::find($id))
                ->with('section', 'reuniones');
    }


    public function update(Request $request, $id)
    {
        $meeting = \App\Meeting::find($id);
        $meeting->date = $request->date;
        $meeting->place = $request->place;
        $meeting->attendant = $request->attendant;
        if($request->photo)
        {
            $photo_name = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move( base_path() . '/public/img/meetings', $photo_name);
            $meeting->photo = $photo_name;
        }
        $meeting->save();
        return redirect('/meetings');
    }


    public function destroy($id)
    {
        \App\Meeting::destroy($id);
        return redirect('/meetings');
    }


    public function listRecords()
    {

        return view('admin.meetings.records')
        ->with('meetings', \App\Meeting::all())
        ->with('section', 'reuniones');
    }

    public function editRecords($id)
    {

        return view('admin.meetings.edit_record')
                ->with('meeting', \App\Meeting::find($id))
                ->with('section', 'reuniones');
    }

    public function saveRecord(Request $request)
    {
        $meeting = \App\Meeting::find($request->meeting_id);
        $meeting->record = $request->record;
        $meeting->save();
        return redirect('/meetings_records');
    }

    public function listAssistance()
    {
        $meetings = \App\Meeting::orderBy('date', 'desc')->get();

        $meetingsAssigned = $meetings->filter(function ($meeting) {
            return $meeting->isAssigned();
        });

        $meetingsUnAssigned = $meetings->filter(function ($meeting) {
            return !$meeting->isAssigned();
        });

        return view('admin.meetings.assistance')
            ->with('meetingsAssigned', $meetingsAssigned)
            ->with('meetingsUnAssigned', $meetingsUnAssigned)
            ->with('users', \App\User::all())
            ->with('section', 'reuniones');
    }

    public function editAssistance($id)
    {
        $meeting = \App\Meeting::find($id);
        $user_registers = $meeting->users;
        $users = \App\User::all();
        $diff = $users->diff($user_registers);
        $user_no_registers = $diff->all();
        //dd($diff);
        return view('admin.meetings.edit_assistance')
            ->with('users_reg', $user_registers)
            ->with('users_noreg', $diff)
            ->with('meeting', $meeting)
            ->with('section', 'reuniones');
    }

    public function saveAssistance(Request $request)
    {
        $meeting = \App\Meeting::find($request->meeting_id);

        if($meeting->users)
        {
            $meeting->users()->detach();
        }

        $meeting->users()->attach($request->to);

        $meeting->assistance =  ($meeting->users()->count() * 100) / \App\User::all()->count();
        $meeting->save();

        return redirect('/meetings_assistance');
    }


}
