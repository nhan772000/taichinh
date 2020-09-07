<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Admin_users;
use Session;
session_start();

class HomepageController extends Controller
{
	  // public function __construct() {
	  //  return $this->middleware('auth');
	  // }
    public function showHomepage()
   {

	   	if (Auth::check()) {
	   		return view('homepage', ['user' => Auth::user()]);
	   	}
	   	else{

	   		return Redirect::to('/login');
	    	
	    }
   	}











}
