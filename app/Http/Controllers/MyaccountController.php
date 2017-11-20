<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MyaccountController extends Controller
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
    public function index(Request $request)
    {
       // var_dump($request->session()->all());exit;
      // $user = \Auth::user();
       //var_dump($user);

       $users = DB::table('users')->get();
        return view('home/home', ['users' => $users]);
    }

    /**
     * 
     */
    public function getstripe () {

        return view('myaccount/getstripe');
    }


    public function update() {
        return view('home/update'); 
    }
}
