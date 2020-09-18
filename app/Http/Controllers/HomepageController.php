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
use Carbon\Carbon;
use Session;
session_start();

class HomepageController extends Controller
{
	  // public function __construct() {
	  //  return $this->middleware('auth');
	  // }
	public function checkKYC($email, $phone, $identify,$address, $GPKD){
		$string = $email.$phone.$identify.$address.$GPKD;
		if(substr_count($string, '1') == 0 || substr_count($string, '1') == 1){
			return 0;
		}
		elseif(substr_count($string, '1') == 2){
			return 1;
		}
		elseif(substr_count($string, '1') == 3){
			return 2;
		}
		elseif(substr_count($string, '1') == 4){
			return 3;
		}
		elseif(substr_count($string, '1') == 5){
			return 4;
		}

	}
	public function resetPoint($kvc){
		
	    	
	    	if($kvc == 0){
	    		return 50;

	    	}elseif($kvc == 1){
	    		
	    		return 300;
	    	}
	    	elseif($kvc == 2 || $kvc == 3){
	    		
	    		return 1000;
	    	}
	    	elseif($kvc == 4){
	    		return 5000;

	    	}

	}
	    
    public function showHomepage()
   {

	   	if (Auth::check()) {
	   		$user = Auth::user();
	   		$main_wallet = WalletMain::where('main_wallet_ofuser', $user->id)->first();
	   		$ext_wallet = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
	   		$eco_wallet = WalletEco::where('eco_wallet_ofuser', $user->id)->first();
	   		$hm_wallet = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();

	   		$dayNow = Carbon::now('Asia/Ho_Chi_Minh')->day;

	    	if($user->user_day_old != $dayNow){
	    		$checkKYC = $this->checkKYC($user->user_active_email, $user->user_active_phone, $user->user_active_identify, $user->user_active_address, $user->user_active_GPKD);

	    		$point = $this->resetPoint($checkKYC);

	    		$user_update = User::find($user->id);
	   			$user_update->user_point_everyday = $point;
	   			$user_update->user_day_old = $dayNow;
	   			$user_update->save();

		    }
		   
	   		return view('homepage', ['user' => $user, 'main_wallet' => $main_wallet, 'ext_wallet' => $ext_wallet, 'eco_wallet' => $eco_wallet]);
	   	}
	   	else{

	   		return Redirect::to('/login');

	    }
   	}











}