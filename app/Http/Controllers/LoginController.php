<?php

namespace App\Http\Controllers;

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

        return view('login.home');
    }
}