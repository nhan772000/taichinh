<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Transaction;

class NapController extends Controller
{
   public function postTransaction(Request $request)
   {			
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		if(Hash::check($request->pwdtt,$passWord)){
			$destinationPath = 'uploads/imgChuyenKhoan/';
		    $file = $request->file('picture'); // will get all files
	        $file_name = $file->getClientOriginalName(); //Get file original name
	        $file->move($destinationPath , $file_name); // move files to destination folder
	        $url_phieuCK = $destinationPath. "" .$file_name;
		    $transaction = new Transaction();
		    $transaction->transaction_type = $request->nap;
		    $transaction->transaction_teller = $id;
		    $transaction->Transaction_phieuCK = $url_phieuCK;
			$transaction->save();
			return back()->with('success','Bạn đã nạp tiền thành công. Chúng tôi sẽ cập nhật ví tiền của bạn sớm nhất có thể!');
   		}else{
   			return back()->with('error','Sai mật khẩu!');
   		}
	   		

	}	
 }

