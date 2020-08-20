<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DepositController extends Controller
{
   public function deposit()
   {
   		return view('deposit');
   }
}
