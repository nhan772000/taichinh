<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Uocmuon;

class UocMuonController extends Controller
{
   public function giaodienUocMuon()
   {
	    if (Auth::check())
		{
		   $uocmuon = Uocmuon::all();
			return view('uocmuon',['uocmuon' => $uocmuon]);
		}
		else {
			return redirect('/');
		}
   }
   public function danguocmuon(Request $request)
   {
	   
	  
			// The user is logged in...
			if($request->has('uocmuon')) {
			   $uocmuon = new Uocmuon;
				$uocmuon->uocmuon_content = $request->uocmuon;
				$uocmuon->save();
				return redirect('/uocmuon');
		   }
			else {
				return redirect('/');
			}
			
			
		

	   
   }
}