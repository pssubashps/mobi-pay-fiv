<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    public function getstripe (Request $request) {

        if ($request->isMethod('post')) {
            
              $validatedData = $request->validate([
                  'user_stripe_api_key' => 'required|string|max:255',
                  'user_stripe_api_secret' => 'required|string|max:255',
               
                
              ]);
  
              $update = [
                  'user_stripe_api_key' => $request->input('user_stripe_api_key')    ,    
                  'user_stripe_api_secret' => $request->input('user_stripe_api_secret')        
              ];
 
              DB::table('users')
              ->where('id', Auth::user()->id)
              ->update($update);
              
          }
        $users = DB::table('users')->where('id', Auth::user()->id)->first();
       // var_dump($users);exit;
        return view('myaccount/getstripe',['user' => $users]);
    }


    public function update() {
        return view('home/update'); 
    }
}
