<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SignUpController extends Controller
{
    public function signup(){
    	return view('signup');
    }
}
