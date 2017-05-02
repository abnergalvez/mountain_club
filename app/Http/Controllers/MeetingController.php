<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        return view('admin.meetings.index')
                ->with('meetings', \App\Meeting::all())
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

    public function listAssistance()
    {

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


}
