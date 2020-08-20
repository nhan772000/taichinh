<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RutController extends Controller
{
   public function showRut()
   {
   	return  view ('rut');
   }
}