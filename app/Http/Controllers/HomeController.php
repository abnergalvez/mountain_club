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
            return view('admin.dashboard');
          }
          elseif($user->isMember())
          {
            return view('member.home');
          }
          else
          {
            return redirect('/');
          }

        }
}
