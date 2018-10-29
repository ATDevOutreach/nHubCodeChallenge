<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use App\Business;
use DB;

class DashboardController extends Controller
{
  public function superDash() {
  	return view('dashboard.superdash');
  }

  public function adminDash() {
    if(!Sentinel::check()) {
      return redirect()->route('get_login');
    }
    else{
      $authUser = Sentinel::getUser();
      return view('dashboard.admindash')->with('user', $authUser);
    }
  }

  public function memberDash() {
    if(!Sentinel::check()) {
      return redirect()->route('get_login');
    }
    else{
      $authUser = Sentinel::getUser();
      // $business = Business::where('user_id', $authUser->id)->first();
      // $business = DB::table('users')
      //       ->leftJoin('businesses', 'users.id', '=', 'businesses.user_id')
      //       ->first();
      // dd($authUser);
      return view('dashboard.dash')->with('user', $authUser);
    }    
  }
}
