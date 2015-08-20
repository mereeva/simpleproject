<?php

namespace App\Http\Controllers;

use Mail;
use App\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function index(){
        return view('login.home');
    }


    public function register(Request $request)
    {
        //Validation Check
         $this->validate($request, [
        'name' => 'required',    
        'email' => 'required|email|unique:user_details|max:255',
        'city' => 'required',
        'min_rent' => 'required|integer',
        'max_rooms' => 'required|integer',
        ]);

         //Adding Data into Database
        $userdetails = new UserDetails;
        $userdetails->name = $request->name;
        $userdetails->email = $request->email;
        $userdetails->city = $request->city;
        $userdetails->min_rent = $request->min_rent;
        $userdetails->max_rooms = $request->max_rooms;
        $userdetails->save();

        Mail::send('emails.register', $userdetails->toArray(), function ($m) use($userdetails){
            $m->to($userdetails->email, $userdetails->name)->subject('Registration Successful');
        });

        return view('login.home');

    }

}