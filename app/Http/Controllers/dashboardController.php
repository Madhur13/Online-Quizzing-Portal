<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Illuminate\Support\Facades\Auth;

use DB;

class dashboardController extends Controller
{
    
	public function login_check(){

		$userdata = array(
                'username' => Input::get('login_username'),
                'password' => Input::get('login_password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            $user = \App\User::where('username','=',$userdata['username'])->get()->first();
            Auth::login($user);

            return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());

        } else {        
            return Redirect::to('/')->with('alert','Login Error!! Please check your Credentials');

        }
	}

	public function signup(Request $data){

		$user = new \App\User;

		$user->username = $data->username;
		$user->user_type = $data->type;
		$user->password = \Hash::make($data->password);

		$user->save();

		return back()->with('alert','Signup Successful, login to continue!!');

	}

	public function dashboard(){
		$user = Auth::user();
	
        if($user->user_type == "student")
		{
           return Redirect::to('/online_quizzing/student/');
		}

		if($user->user_type == "faculty")
		{
           return Redirect::to('/online_quizzing/faculty/');
		}	
	}

	public function logout(){
		Auth::logout();

		return Redirect::to('/');
	}


	public function attachRole($role){

		$user = \App\users::where('username',Auth::user()->username)->first();

        $admin = \App\Role::where('name','=',$role)->get()->first();

		$user->attachRole($admin);

        return back()->with('role-attached','Role Successfully attached to '.Auth::user()->username);
	}

}