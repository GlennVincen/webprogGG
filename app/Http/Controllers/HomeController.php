<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
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
        return view('home');
    }

    public function manualLogin(Request $request){
        $user = User::find($request->id);

        Auth::login($user);
        return redirect('/home');
    }

    public function manualLogout(Request $request){
        Auth::logout();
        return redirect('/home');
    }

}
