<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
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

  
    public function index () {
        $users = DB::table('users')->get();
        return view('user/index', ['users' => $users]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
           
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'twilio_phonenumber' => 'required|string|max:15|unique:users',
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'twilio_phonenumber' => $request->input('twilio_phonenumber'),
            ]);
            
        }
        return view('user/add'); 
    }

    public function update ($id, Request $request) {
       // $id =$request->input('id');
        if ($request->isMethod('post')) {
           
             $validatedData = $request->validate([
                 'name' => 'required|string|max:255',
              
               
             ]);
 
             $update = [
                 'name' => $request->input('name')            
             ];

             DB::table('users')
             ->where('id', $id)
             ->update($update);
             
         }
         $user = DB::table('users')->where('id', $id)->first();
        // var_dump($user);exit;
         return view('user/update', ['user' => $user]);
             }
}
