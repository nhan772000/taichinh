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
use App\WalletECo;
use App\WalletHistory;
use App\Payment;

class WalletMainController extends Controller
{
	public function MLM($id, $count){
		if($count >= 0){
			$id_ref = User::where('id', $id)->value('id_ref');
			$eco_wallet_amount = WalletEco::where('eco_wallet_ofuser', $id_ref)->value('eco_wallet_amount');
			$temp = $eco_wallet_amount - 500;
			if ($count == 1 ){
				$rate = 0.03;
			}else if($count > 1 && $count < 6){
				$rate = 0.005;
			}else if($count > 5 && $count < 16){
				$rate = 0.002;
			}else{
				$rate = 0.001;
			}
			if($temp > 0){
				if($temp > ($rate * $eco_wallet_amount)){
					$ext_wallet_amount_new = WalletExt::where('ext_wallet_ofuser', $id_ref)->value('ext_wallet_amount') + ($rate * $eco_wallet_amount);
					WalletExt::where('ext_wallet_ofuser',$id_ref)->update(['ext_wallet_amount' => $ext_wallet_amount_new]);
					return MLM($id_ref, $count -1);
				}else{
					$ext_wallet_amount_new = WalletExt::where('ext_wallet_ofuser', $id_ref)->value('ext_wallet_amount') + $temp;
					WalletExt::where('ext_wallet_ofuser',$id_ref)->update(['ext_wallet_amount' => $ext_wallet_amount_new]);
					return MLM($id_ref, $count -1);
				}
			}else{

				return MLM($id_ref, $count -1);
			}
			WalletMain::where('main_wallet_ofuser',$transaction_ofuser)->update(['main_wallet_amount' => $wallet_main_amount]);
		}else{
			return null;
		}
	}
	public function getWalletManager(){
		$id = Auth::user()->id;  
		$main_wallet_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
		$eco_wallet_amount = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_amount');
		$ext_wallet_amount = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
		$arr_wallet_amount = array('main_wallet_amount' => $main_wallet_amount,
								'eco_wallet_amount' => $eco_wallet_amount,
								'ext_wallet_amount' => $ext_wallet_amount);



		return view('walletmanager', ['arr_wallet_amount' => $arr_wallet_amount]);
	}

	public function getWalletDetail(Request $request){
		$id = Auth::user()->id;
		$type_wallet = $request->type;
		if ($type_wallet == 0){
			$wallet_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
			$main_wallet_id = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');
			$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $main_wallet_id,'wallet_history_typewallet' => $type_wallet])->get();
		}else if ($type_wallet == 1){
			$wallet_amount = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
			$ext_wallet_id = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_id');
			$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $ext_wallet_id,'wallet_history_typewallet' => $type_wallet])->get();
		}else if ($type_wallet == 2){
			$wallet_amount = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_amount');
			$eco_wallet_id = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_id');
			$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $eco_wallet_id,'wallet_history_typewallet' => $type_wallet])->get();
		}

		
		return view('walletdetail',['wallet_amount' => $wallet_amount, 'wallet_histories' => $wallet_histories]);
	}
    public function NapTransaction(Request $request)
   {			
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		$rate = 1000;
   		if(Hash::check($request->pwdtt,$passWord)){
   			//upload file
			$destinationPath = 'uploads/imgChuyenKhoan/';
			$file = $request->file('picture'); 
			$file2 = $request->file('picture2'); 

	        $file_name = $file->getClientOriginalName(); 
			$file->move($destinationPath , $file_name); 
			
			$file_name2 = $file2->getClientOriginalName(); 
	        $file2->move($destinationPath , $file_name2); 

			$url_phieuCK = $destinationPath. "" .$file_name;
			$url_phieuCK2 = $destinationPath. "" .$file_name2;

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
			$transaction->Transaction_bill2 = $url_phieuCK2;
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
				$wallet_id_send = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');
				$wallet_id_receiving = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');

				if($pointSend <= $wallet_amount_send){
					
					$cashBackTK = new TransactionController();
					$cashBackTK->cashBackTietKiem($pointSend, $idReceiving);
					$wallethistory = new WalletMainController();
					$wallethistory->createWalletHistory($pointSend, $wallet_id_send, 1, 2 );
					$wallethistory->createWalletHistory($pointSend, $wallet_id_receiving, 1, 2 );

					return back()->with('success','Đã chuyển thành công');	
				}else{
					return back()->with('error','Số dư không đủ!');
				}
			}elseif (($request->wallet) == 1){
				$wallet_amount_send = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
				$wallet_amount_receiving = WalletExt::where('ext_wallet_ofuser', $idReceiving)->value('ext_wallet_amount');
				$wallet_id_send = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');
				$wallet_id_receiving = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');

				if($pointSend <= $wallet_amount_send){
					
					$cashBackTK = new TransactionController();
					$cashBackTK->cashBackVeLien($pointSend, $idReceiving);
					$wallethistory = new WalletMainController();
					$wallethistory->createWalletHistory($pointSend, $wallet_id_send, 2, 2 );
					$wallethistory->createWalletHistory($pointSend, $wallet_id_receiving, 2, 2 );

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

 	public function createWalletHistory($amount, $ofwallet, $type, $typeorder){ 		
 	    $wallethistory = new WalletHistory();
		$wallethistory->wallet_history_amount = $amount;
		$wallethistory->wallet_history_ofwallet = $ofwallet;
		$wallethistory->wallet_history_type = $type;
		$wallethistory->wallet_history_typeorder = $typeorder;
		$wallethistory->save();
 	}
}
