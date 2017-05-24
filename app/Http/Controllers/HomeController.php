<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
        {
          $user=\Auth::user();
          if($user->isAdmin())
          {

            return view('admin.dashboard')
                ->with('meetings',\App\Meeting::all())
                ->with('users',\App\User::all())
                ->with('equipments',\App\Equipment::all())
                ->with('equipments_lean',\DB::table('equipment_user')->get())
                ->with('equipments_late_return',\DB::table('equipment_user')->where('return','<',date('Y-m-d H:i:s'))->get())
                ->with('contacts',\App\Contact::all())
                ->with('suggestions',\App\Suggestion::all())
                ->with('section','home');
          }
          elseif($user->isMember())
          {
            return view('member.home')->with('section','home');
          }
          else
          {
            return redirect('/');
          }

        }
}
