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
use App\WalletLevel;

class WalletMainController extends Controller
{
	public function getPTTT(){
		if (Auth::check()){
			
		}else{
			return redirect('/login')->with('erro','You must logged in'); 
		}
		$id = Auth::user()->id;
		$array_F1 = User::where(['id_ref' => $id, 'pttt_status' => 0])->get();
		$array_id_F1= [];
		foreach($array_F1 as $F1){
			array_push($array_id_F1, $F1->id); 
		}
		if(count($array_id_F1)>=5){
			$array_F1_qualified = [];
			foreach ($array_id_F1 as $id_F1){
				$main_wallet_amount_F1 = WalletMain::where('main_wallet_id', $id_F1)->value('main_wallet_amount');
				if($main_wallet_amount_F1 >= 500){
					array_push($array_F1_qualified, $id_F1);
				}
			}
			$count_gift = count($array_F1_qualified)/5;
			if(count($array_F1_qualified) == 5){
				return view('PTTTview',['checkpttt' => true, 'count_gift' => $count_gift]);
			}else{
				return view('PTTTview',['checkpttt'=> false]);
			}
		}else{
			return view('PTTTview',['checkpttt'=> false]);	
		}
	}
	public function postPTTT(Request $request){
		if (Auth::check()){
			
		}else{
			return redirect('/login')->with('error','You must logged in'); 
		}
		$id = Auth::user()->id;
		$array_F1 = User::where(['id_ref' => $id, 'pttt_status' => 0])->get();
		$array_id_F1= [];
		$array_F1_qualified = [];

		foreach($array_F1 as $F1){
			array_push($array_id_F1, $F1->id); 
		}
		if(count($array_id_F1)>=5){
			foreach ($array_id_F1 as $id_F1){
				$main_wallet_amount_F1 = WalletMain::where('main_wallet_id', $id_F1)->value('main_wallet_amount');
				if(($main_wallet_amount_F1 >= 500)&&(count($array_F1_qualified) < 5)){
					array_push($array_F1_qualified, $id_F1);
				}
			}
		}
		if(count($array_F1_qualified) == 5){
			foreach($array_F1_qualified as $F1_qualified){
				User::where('id', $F1_qualified)->update(['pttt_status'=> 1]);
			}
			$level_wallet = WalletLevel::where('level_wallet_ofuser',$id)->first();
			WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_amount'=> $level_wallet->level_wallet_amount + 100]);
			$walletmainController = new WalletMainController();
			$walletmainController->createWalletHistory(100, $id, $id, $level_wallet->level_wallet_id, 3, 1 , 5);

			return back()->with('success','Thank you for your contribution to system development');
		}else{
			return redirect('/pttt')->with('error','Oh, you are not qualified to do this');
		}
	}
	public function transfer(Request $request){
		if (Auth::check())
		{
			$id = Auth::user()->id;
				$transfer_status = User::where('id', $id)->value('transfer_status');
				$created = date("d/m/Y",strtotime(User::where('id', $id)->value('created_at'))). " +1 month";
				$today = date("d-m-Y");
				$today = strtotime($today);
				if ($transfer_status == 0){
					if($created <= $today ){
						$main_wallet = WalletMain::where('main_wallet_ofuser', $id)->first();
						$eco_wallet = WalletEco::where('eco_wallet_ofuser', $id)->first();

						if($main_wallet->main_wallet_amount < 1000){
							$max_transfer = $main_wallet->main_wallet_amount;
						}else{
							$max_transfer = 1000;
						}
						$transfer_point = $request->transfer_point * 3;
						if($transfer_point > $max_transfer){
							$transfer_point = $max_transfer;
						}
						WalletMain::where('main_wallet_ofuser',$id)->update(['main_wallet_amount' => $main_wallet->main_wallet_amount - $request->transfer_point]);
						WalletEco::where('eco_wallet_ofuser',$id)->update(['eco_wallet_amount' => $eco_wallet->eco_wallet_amount + $transfer_point	]);
						User::where('id',$id)->update(['transfer_status' => 1]);
						
						$transactionConntroller = new TransactionController(); 
						$transactionConntroller->createTransaction(6, $id, $id, 0, null, $request->transfer_point, 'Transfer tru tien vi chinh', null, null, 1);
						$transactionConntroller->createTransaction(6, $id, $id, 0, null, $transfer_point, 'Transfer cong tien vi tiet kiem', null, null, 1);

						$walletmainController = new WalletMainController();
						$walletmainController->createWalletHistory($request->transfer_point, $id, $id, $main_wallet->main_wallet_id , 0, 0 ,6);
						$walletmainController->createWalletHistory($transfer_point, $id, $id, $eco_wallet->eco_wallet_id , 2, 1 ,6);

						$walletmainController->MLM($id,20,$id);
						return redirect('/')->with('success','Bạn đã chuyển thành công');
					}else{
						return redirect('/')->with('error','Your account has not been created after 30 days');
					}
				}else{
					return redirect('/')->with('error','You cannot transfer 2 times');
				}
				return redirect('/')->with('error','erroooooor!!!');	
		}else{
			return redirect('/login')->with('erro','You must logged in');
		}
	}
	public function MLM($id, $count, $id_MLM){
		if($count >= 0){
			$id_ref = User::where('id', $id_MLM)->value('id_ref');
			$eco_wallet_amount = WalletEco::where('eco_wallet_ofuser', $id_ref)->value('eco_wallet_amount');
			$temp = $eco_wallet_amount - 500;
			$mlm = new WalletMainController(); 
			if ($count == 1 ){
				$rate = 0.03;
			}else if($count > 1 && $count < 6){
				$rate = 0.005;
			}else if($count > 5 && $count < 16){
				$rate = 0.002;
			}else{
				$rate = 0.001;
			}
			$wallet_ext = WalletExt::where('ext_wallet_ofuser', $id_ref)->first();

			if($temp > 0){
				if($temp > ($rate * $eco_wallet_amount)){
					$ext_wallet_amount_new = $wallet_ext->ext_wallet_amount + ($rate * $eco_wallet_amount);
					WalletExt::where('ext_wallet_ofuser',$id_ref)->update(['ext_wallet_amount' => $ext_wallet_amount_new]);
				
					$transactionConntroller = new TransactionController(); 
					$transactionConntroller->createTransaction(4, $id, $id_ref, 0 ,null , $rate * $eco_wallet_amount, 'MLM cong vao vi phu', null, null, 1);

					$walletmainController = new WalletMainController();
					$walletmainController->createWalletHistory($rate * $eco_wallet_amount, $id, $id_ref, $wallet_ext->ext_wallet_id, 1, 1 ,4);

					return $mlm->MLM($id, $count -1, $id_ref);
				}else{
					$ext_wallet_amount_new = WalletExt::where('ext_wallet_ofuser', $id_ref)->value('ext_wallet_amount') + $temp;
					WalletExt::where('ext_wallet_ofuser',$id_ref)->update(['ext_wallet_amount' => $ext_wallet_amount_new]);
				
					$transactionConntroller = new TransactionController(); 
					$transactionConntroller->createTransaction(4, $id, $id_ref, 0 ,null , $temp, 'MLM cong vao vi phu', null, null, 1);

					$walletmainController = new WalletMainController();
					$walletmainController->createWalletHistory($temp, $id, $id_ref, $wallet_ext->ext_wallet_id, 1, 1 ,4);

					return $mlm->MLM($id, $count -1,$id_ref);
				}
			}else{
				return $mlm->MLM($id, $count -1,$id_ref);
			}
		}else{
			return null;
		}
	}
	public function getWalletManager(){
		if (Auth::check())
		{
			$id = Auth::user()->id;  
			$main_wallet_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
			$eco_wallet_amount = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_amount');
			$ext_wallet_amount = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
			$arr_wallet_amount = array('main_wallet_amount' => $main_wallet_amount,
									'eco_wallet_amount' => $eco_wallet_amount,
									'ext_wallet_amount' => $ext_wallet_amount);



			return view('walletmanager', ['arr_wallet_amount' => $arr_wallet_amount]);
		}
		else {
			return  redirect ('/login');
		}
	}

	public function getWalletDetail(Request $request){
		if (Auth::check())
		{
			$id = Auth::user()->id;
			$type_wallet = $request->type;
			if ($type_wallet == 0){
				$wallet_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
				$main_wallet_id = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_id');
				$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $main_wallet_id,'wallet_history_typewallet' => $type_wallet])->orderBy('created_at', 'desc')->get();
			}else if ($type_wallet == 1){
				$wallet_amount = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
				$ext_wallet_id = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_id');
				$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $ext_wallet_id,'wallet_history_typewallet' => $type_wallet])->orderBy('created_at', 'desc')->get();
			}else if ($type_wallet == 2){
				$wallet_amount = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_amount');
				$eco_wallet_id = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_id');
				$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $eco_wallet_id,'wallet_history_typewallet' => $type_wallet])->orderBy('created_at', 'desc')->get();
			}else if ($type_wallet == 3){
				$wallet_amount = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_amount');
				$level_wallet_id = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_id');
				$wallet_histories = WalletHistory::where(['wallet_history_ofwallet' => $level_wallet_id,'wallet_history_typewallet' => $type_wallet])->orderBy('created_at', 'desc')->get();
			}

			
			return view('walletdetail',['wallet_amount' => $wallet_amount, 'wallet_histories' => $wallet_histories]);
		}
		else {
			return  redirect ('/login');
		}
	}
    public function NapTransaction(Request $request)
   {			
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		if(Hash::check($request->pwdtt,$passWord)){
   			//upload file
			$destinationPath = 'uploads/imgChuyenKhoan/';
			$file = $request->file('picture'); 
			$file2 = $request->file('picture2'); 

	        $file_name = $file->getClientOriginalName(); 
			$file->move($destinationPath , $file_name); 
			$url_phieuCK = $destinationPath. "" .$file_name;

			if($file2 != null){
				$file_name2 = $file2->getClientOriginalName(); 
				$file2->move($destinationPath , $file_name2); 
				$url_phieuCK2 = $destinationPath. "" .$file_name2;
			}else{
				$url_phieuCK2 = null;
			}


	        //insert to database
		    $transactionConntroller = new TransactionController(); 
			$transactionConntroller->createTransaction(1, null, $id, null ,$request->currency , $request->point, $request->description, $url_phieuCK, $url_phieuCK2, 0);


			return back()->with('success','Bạn đã nạp tiền thành công. Chúng tôi sẽ cập nhật ví tiền của bạn sớm nhất có thể!');
   		}else{
   			return back()->with('error','Sai mật khẩu!');
   		}
	   		

	}

	 public function RutTransaction(Request $request){				
   		$id = Auth::user()->id;  
   		$passWord = Auth::user()->password;  
   		$walletmain_amount = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
   		if ($request->point <= $walletmain_amount){
   			if(Hash::check($request->pwdtt,$passWord)){
 
				   $transactionConntroller = new TransactionController(); 
				   $transactionConntroller->createTransaction(0, $id, null, null ,$request->currency, $request->point, null, null, null, 0);
				return back()->with('success','Bạn đã rút tiền thành công. Chúng tôi sẽ chuyển tiền của bạn sớm nhất có thể!');
	   		}else{
	   			return back()->with('error','Sai mật khẩu!');
	   		}

   		}else{
   			return back()->with('error','Số dư không đủ!!!');
	   		
   		}
   	}	




 	public function createWalletHistory($point, $fromuser, $touser, $ofwallet, $typewallet, $type ,$typeorder){ 		
 	    $wallethistory = new WalletHistory();
		$wallethistory->wallet_history_point = $point;
		$wallethistory->wallet_history_fromuser = $fromuser;
		$wallethistory->wallet_history_touser = $touser;
		$wallethistory->wallet_history_ofwallet = $ofwallet;
		$wallethistory->wallet_history_typewallet = $typewallet;
		$wallethistory->wallet_history_type = $type;
		$wallethistory->wallet_history_typeorder = $typeorder;
		$wallethistory->save();
 	}
}
