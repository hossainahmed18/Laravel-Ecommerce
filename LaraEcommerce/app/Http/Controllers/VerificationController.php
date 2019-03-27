<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
    public function FunctionName($token)
    {
    	$user=User::where('remember_token', $token)->first();
        if(!is_null($user)){
        	$user->status= 1;
        	$user->remember_token=NULL;

        	$user->save();
    	    session()->flash('success',"You are registered now|| Login Now");
    	    return redirect('login');

        }else{
        	session()->flash('errors',"You Token is not matched");
        	return redirect('/');
        }

    	
    }
}
