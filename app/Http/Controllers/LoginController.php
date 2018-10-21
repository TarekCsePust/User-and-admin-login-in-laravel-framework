<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		$user = User::where('email',$request->email)->first();
    		if($user->is_admin())
    		{
    			return redirect()->route('admin');
    		}
    		elseif($user->approval)
    		{
    			return redirect()->route('home');
    			//return view('home');
    		}
    		else
    		{
    			Auth::logout();
    			return redirect()->route('login');
    		}
    	}
    }

    public function userlogin()
    {
    	if(Auth::user()->admin)
    	{
    		return redirect()->back();
    	}
    	else
    	{
    		return view('home');
    	}
    }

    public function adminlogin()
    {
    	if(Auth::user()->admin)
    	{
    		return view('admin');
    	}
    	else
    	{
    		return redirect()->back();
    	}
    }

}
