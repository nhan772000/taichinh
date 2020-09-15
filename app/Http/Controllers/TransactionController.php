<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\WalletEco;
use App\Transaction;
use App\WalletExt;
use App\WalletLevel;
use App\WalletMain;
use Yajra\Datatables\Datatables;


class TransactionController extends Controller
{


   //Hung



   public function createTransaction($transaction_typeorder, $transaction_fromuser, $transaction_touser, $transaction_checker ,$transaction_typecurrency, $transaction_point, $transaction_description, $transaction_bill, $transaction_bill2, $transaction_status){ 	
		$transaction = new Transaction();
		$transaction->transaction_typeorder = $transaction_typeorder;
		$transaction->transaction_fromuser = $transaction_fromuser;
		$transaction->transaction_touser = $transaction_touser;
		$transaction->transaction_checker = $transaction_checker;
		$transaction->transaction_typecurrency = $transaction_typecurrency;
		$transaction->transaction_point = $transaction_point;
		$transaction->transaction_description = $transaction_description;
		$transaction->transaction_bill = $transaction_bill;
		$transaction->transaction_bill2 = $transaction_bill2;
		$transaction->transaction_status = $transaction_status;
		$transaction->save();
   }	
   
   public function cashBackTietKiem($points, $idNguoiNhan)
   {
      $id = auth()->user()->id;
      //lay VI CHINH/VI TK/ VI HM cua user hien tai
      $pointMainWalletA = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_point');
      $pointMainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->value('main_wallet_point');

      $pointEcoWalletA = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_point');
      $pointEcoWalletB = WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->value('eco_wallet_point');

      $pointLvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_ofuser');
      $pointLvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->value('level_wallet_ofuser');

      //  XU LY VI CHINH A VA B 
      $pointMainWalletA = $pointMainWalletA - $points - (0.01 * $points);
      $pointMainWalletB = $pointMainWalletB + (0.9 * $points);

      //XU LY VI TIET KIEM A VA B
      $pointEcoWalletA = $pointEcoWalletA + (0.3 * $points);
      $pointEcoWalletB = $pointEcoWalletB + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $pointLvlWalletA = $pointLvlWalletA - $points;
      $pointLvlWalletB = $pointLvlWalletB + (0.9 * $points);

      WalletMain::where('main_wallet_ofuser', $id)->update(['main_wallet_point' => $pointMainWalletA]);
      WalletEco::where('eco_wallet_ofuser', $id)->update(['eco_wallet_point' => $pointEcoWalletA]);
      WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_point' => $pointLvlWalletA]);


      WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->update(['main_wallet_point' => $pointMainWalletB]);
      WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->update(['eco_wallet_point' => $pointEcoWalletB]);
      WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->update(['level_wallet_point' => $pointLvlWalletB]);
   }

   public function cashBackVeLien($points, $idNguoiNhan)
   {
      $id = auth()->user()->id;
      //lay VI CHINH/VI TK/ VI HM cua user hien tai
      $pointMainWalletA = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_point');
      $pointMainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->value('main_wallet_point');
      // VI PHU A
      $pointExtWalletA = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_point');
      // VI TIET KIEM B
      $pointEcoWalletB =  WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->value('eco_wallet_point');

      $pointLvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_point');
      $pointLvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->value('level_wallet_point');

      //  XU LY VI CHINH A VA B 
      $pointMainWalletA = $pointMainWalletA - $points - (0.01 * $points);
      $pointMainWalletB = $pointMainWalletA + (0.9 * $points);

      //XU LY VI PHU A
      $pointExtWalletA =  $pointExtWalletA + (0.05 * $points);

      //XU LY VI TIET KIEM B
      $pointEcoWalletB =$pointEcoWalletB + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $pointLvlWalletA = $pointLvlWalletA - $points;
      $pointLvlWalletB =$pointLvlWalletB + (0.9 * $points);

      WalletMain::where('main_wallet_ofuser', $id)->update(['main_wallet_point' => $pointMainWalletA]);
      WalletExt::where('ext_wallet_ofuser', $id)->update(['ext_wallet_point' => $pointExtWalletA]);
      WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_point' => $pointLvlWalletA]);


      WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->update(['main_wallet_point' => $pointMainWalletB]);
      WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->update(['eco_wallet_point' => $pointEcoWalletB]);
      WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->update(['level_wallet_point' => $pointLvlWalletB]);
   }

   public function showTransactionHistory(Request $request)
   {
      $id = auth()->user()->id;
      // $mainWalletA = WalletMain::where('main_wallet_ofuser', $id)->first()->toArray();

      // dd($mainWalletA['main_wallet_point'] );
      $transactionDate = $request->ngaygiaodich;
      $transactionOrder = $request->sel1;
      $transactions = Transaction::where('transaction_ofuser', $id)->get();
      if (!empty($request->all())) {
         if (!empty($transactions)) {
            if ($transactionDate) {
               if ($transactionOrder != 1) {
                  $transactions = Transaction::where('transaction_ofuser', $id)
                     ->where('created_at', "LIKE", "%$transactionDate%")
                     ->where('transaction_order', $transactionOrder)->get();
                  if (empty($transactions->toArray())) {
                     return view('transactionHistory')->with("message", "You dont have any transaction");
                  }
               } else {
                  $transactions = Transaction::where('transaction_ofuser', $id)
                     ->where('created_at', "LIKE", "%$transactionDate%")->get();
                  if (empty($transactions->toArray())) {
                     return view('transactionHistory')->with("message", "You dont have any transaction");
                  }
               }
            } else {
               if ($transactionOrder != 1) {
                  $transactions = Transaction::where('transaction_ofuser', $id)
                     ->where('transaction_order', $transactionOrder)->get();
                  if (empty($transactions->toArray())) {
                     return view('transactionHistory')->with("message", "You dont have any transaction");
                  }
               }
            }
         } else {
            return view('transactionHistory')->with("message", "You dont have any transaction");
         }
      } else {
         return view('transactionHistory', compact('transactions'));
      }
      return view('transactionHistory', compact('transactions'));
   }




   //-------------------------------------------Quoc Minh-------------------------------------------

   public function __construct()
   {
      $this->middleware('auth');
   }

   public function showTransaction(Request $request)
   {
      $id = auth()->user()->id;
      if($request->ajax())
      {
         if(!empty($request->ngaygiaodich))
         {
            $transaction = Transaction::where('transaction_ofuser', $id)
                                 ->where('created_at', "LIKE", "%$request->ngaygiaodich%")
                                 ->where('transaction_order', $request->loaigiaodich)
                                 ->get();
         }else {
            $transaction = Transaction::where('transaction_ofuser', $id)->get();
         }
         return Datatables::of($transaction)->make(true);
      }
      $transaction = Transaction::where('transaction_ofuser', $id)->get();
      return view('transactionHistory', compact('transaction'));
   }

   
}