<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Transaction;
use App\User;
use App\WalletMain;
use App\WalletExt;
use App\WalletHistory;
use App\Payment;

class WalletMainController extends Controller
{
   public function NapTransaction(Request $request)
   {			
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		$rate = 1000;
   		if(Hash::check($request->pwdtt,$passWord)){
   			//upload file
			$destinationPath = 'uploads/imgChuyenKhoan/';
		    $file = $request->file('picture'); 
	        $file_name = $file->getClientOriginalName(); 
	        $file->move($destinationPath , $file_name); 

	        $url_phieuCK = $destinationPath. "" .$file_name;
	        $point = $request->point;
	        $amount = $point * $rate;

	        //insert to database
		    $transaction = new Transaction();
			$transaction->transaction_order = 1;
			$transaction->transaction_ofuser = $id;
			$transaction->transaction_checker = null;				   
	   		$transaction->transaction_type = $request->nap;;
		    $transaction->transaction_point = $point;
		    $transaction->transaction_description = $request->description;
		    $transaction->transaction_status = 0;
		    $transaction->Transaction_bill = $url_phieuCK;
			$transaction->save();

			return back()->with('success','Bạn đã nạp tiền thành công. Chúng tôi sẽ cập nhật ví tiền của bạn sớm nhất có thể!');
   		}else{
   			return back()->with('error','Sai mật khẩu!');
   		}
	   		

	}

	 public function RutTransaction(Request $request){				
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		$rate = 1000;	
   		$walletmain_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
   		if ($request->point <= $walletmain_amount){
   			if(Hash::check($request->pwdtt,$passWord)){
	   			$point = $request->point;
	   			$amount = $point * $rate;
 
	   			$transaction = new Transaction();
	   			$transaction->transaction_order = 0;
				$transaction->transaction_ofuser = $id;
				$transaction->transaction_checker = null;				   
	   			$transaction->transaction_type = $request->currency;
	   			$transaction->transaction_point = $point;
	   			$transaction->transaction_description = $request->description;
	   			$transaction->transaction_status = 0;
	   			$transaction->transaction_bill= null;
				$transaction->save();
				
				return back()->with('success','Bạn đã rút tiền thành công. Chúng tôi sẽ chuyển tiền của bạn sớm nhất có thể!');
	   		}else{
	   			return back()->with('error','Sai mật khẩu!');
	   		}

   		}else{
   			return back()->with('error','Số dư không đủ!!!');
	   		
   		}
   	}	

   	public function ChuyenTransaction(Request $request){
   		
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;
   		$idReceiving = User::where('email', $request->email)->value('id');
		$pointSend = $request->point;
		if ($idReceiving == $id){
			return back()->with('error',"Bạn không thể tự chuyển cho bản thân");	   		
		}
   		if(Hash::check($request->pwdtt,$passWord)){
		
   			if ($idReceiving == null){	
				return back()->with('error',"Email 	".$request->email." không tồn tại!");	   		
			}
			if (($request->wallet) == 0){
				$wallet_amount_send = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
				$wallet_amount_receiving = WalletMain::where('main_wallet_ofuser', $idReceiving)->value('main_wallet_amount');


				if($pointSend <= $wallet_amount_send){
					
					$cashBackTK = new TransactionController();
					$cashBackTK->cashBackTietKiem($pointSend, $idReceiving);

					return back()->with('success','Đã chuyển thành công');	
				}else{
					return back()->with('error','Số dư không đủ!');
				}
			}elseif (($request->wallet) == 1){
				$wallet_amount_send = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
				$wallet_amount_receiving = WalletExt::where('ext_wallet_ofuser', $idReceiving)->value('ext_wallet_amount');
				if($pointSend <= $wallet_amount_send){
					
				$cashBackTK = new TransactionController();
					$cashBackTK->cashBackVeLien($pointSend, $idReceiving);

					return back()->with('success','Đã chuyển thành công');	
	
				}else{
					return back()->with('error','Số dư không đủ!');
				}	
			}
		}else{
	   		return back()->with('error','Sai mật khẩu!');	   		
		}


		$payment = new Payment();
	   	$payment->payment_amout = $pointSend;
	   	$payment->payment_fromuser = $id;
	   	$payment->payment_touser = $idReceiving;
	   	$payment->payment_typewallet = $request->wallet;
	   	$payment->payment_description = $request->description;
	   	$payment->payment_status = 1;
		$payment->save();
		return back()->with('success','Chuyển thành công');

			
	   
	   	
 		
	}

 	public function createWalletHistory($amount, $ofwallet, $type){ 		
 	    $wallethistory = new WalletHistory();
		$wallethistory->wallet_history_amount = $amount;
		$wallethistory->wallet_history_ofwallet = $ofwallet;
		$wallethistory->wallet_history_type = $type;
		$wallethistory->save();
 	}
}
