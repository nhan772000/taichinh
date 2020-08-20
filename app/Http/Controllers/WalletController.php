<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function showWallet(){
        return view('wallet');
    }
}
