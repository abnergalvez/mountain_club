<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        return view('admin.suggestions.index')->with('suggestions',\App\Suggestion::all());

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

      \App\Suggestion::create($request->all());
      return redirect('/suggestions_member');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      return view('admin.suggestions.edit')->with('suggestion',\App\Suggestion::find($id));
    }


    public function update(Request $request, $id)
    {
        $suggestion = \App\Suggestion::find($id);
        $suggestion->answer = $request->answer;
        $suggestion->save();
        return redirect('/suggestions');

    }


    public function destroy($id)
    {
        //
    }

    public function userSuggestionStore(Request $request)
    {

    }
}
