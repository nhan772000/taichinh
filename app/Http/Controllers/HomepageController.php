<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\WalletEco;
use App\WalletMain;
use App\WalletExt;
use App\WalletLevel;
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
	   		$user = Auth::user();
	   		$main_wallet = WalletMain::where('main_wallet_ofuser', $user->id)->first();
	   		$ext_wallet = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
	   		$eco_wallet = WalletEco::where('eco_wallet_ofuser', $user->id)->first();
	   		$hm_wallet = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();
	   		Session::put('hm_wallet', $hm_wallet->hm_wallet_point);
	   		return view('homepage', ['user' => $user, 'main_wallet' => $main_wallet, 'ext_wallet' => $ext_wallet, 'eco_wallet' => $eco_wallet]);
	   	}
	   	else{

	   		return Redirect::to('/login');

	    }
   	}











}