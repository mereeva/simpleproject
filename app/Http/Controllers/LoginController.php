<?php

namespace App\Http\Controllers;

use Mail;
use App\Cities;
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

    public function index(Request $request){
        if ($request->session()->has('user_id')) {
            $session_user_id = session('user_id');
            $user = UserDetails::find($session_user_id);
            return view('login.home', ['user' => $user] );
        }
        else{
            return view('login.failure');
        }   
        
    }

    public function getRegister(){
        $cities = cities::lists('name','id');
        return view('login.register', ['cities' => $cities]);
    }

    public function register(Request $request)
    {

        if ($request->session()->has('user_id')) {
            //
        }
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

        //Saving SESSION data
        $userdetails = UserDetails::find($userdetails->id);
        session(['user_id' => $userdetails->id ]);

        $session_user_id = session('user_id');

        ////MAIL functionality
        // Mail::send(['html' => 'emails.register', 'text'=>'emails.register1'], $userdetails->toArray(), function ($m) use($userdetails){
        //     $m->to($userdetails->email, $userdetails->name)->subject('Registration Successful');
        // });

        $user = UserDetails::find($session_user_id);
        return view('login.home', ['user' => $user] );




    }

    public function logout(Request $request){
        $request->session()->flush();
        $cities = cities::lists('name','id');
        return view('login.register', ['cities' => $cities]);
    }


}