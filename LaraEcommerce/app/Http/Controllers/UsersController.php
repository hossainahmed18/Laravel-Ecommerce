<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


use App\User;
use Auth;

use App\Divisions;
use App\District;

class UsersController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
    	$user= Auth::user();
    	return view('pages.users.dashboard',compact('user'));
    }

  public function profile()
  {

    $divisions = Divisions::orderBy('priority', 'asc')->get();
    $districts = District::orderBy('name', 'asc')->get();

    $user = Auth::user();
    return view('pages.users.profile', compact('user', 'divisions', 'districts'));
  }



   public function profileUpdate(Request $request){
     	$user = Auth::user();

     $request->validate([
      'first_name' => 'required|string|max:30',
      'last_name' => 'nullable|string|max:15',
      'username' => 'required|alpha_dash|max:100|unique:users,username,'.$user->id,
      'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
      'division_id' => 'required|numeric',
      'district_id' => 'required|numeric',
      'phone_no' => 'required|max:15|unique:users,phone_no,'.$user->id,
      'street_address' => 'required|max:100',
     ]);

     $user=Auth::user();

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->division_id = $request->division_id;
    $user->district_id = $request->district_id;
    $user->phone_no = $request->phone_no;
    $user->street_address = $request->street_address;
    $user->shipping_address = $request->shipping_address;

    if ($request->password != NULL || $request->password != "") {
      $user->password = Hash::make($request->password);
    }

    $user->ip_address = request()->ip();

    $user->save();


     return back();
   }


}
