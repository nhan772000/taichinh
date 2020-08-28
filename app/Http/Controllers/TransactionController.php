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

class TransactionController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function showTransactionHistory(Request $request)
   {
      $id = auth()->user()->id;
      // $mainWalletA = WalletMain::where('main_wallet_ofuser', $id)->first()->toArray();

      // dd($mainWalletA['main_wallet_amount'] );
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
   //Neu user_hoanve = 1 -> TietKiem 30%
   // Neu user_hoanve = 2 -> VeLien 5%
   public function cashBackTietKiem($points, $idNguoiNhan)
   {
      $id = auth()->user()->id;
      //lay VI CHINH/VI TK/ VI HM cua user hien tai
      $mainWalletA = WalletMain::where('main_wallet_ofuser', $id)->first()->toArray();
      $mainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->first()->toArray();

      $ecoWalletA = WalletEco::where('eco_wallet_ofuser', $id)->first()->toArray();
      $ecoWalletB = WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->first()->toArray();

      $lvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->first()->toArray();
      $lvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->first()->toArray();

      //  XU LY VI CHINH A VA B 
      $amountMainWalletA = $mainWalletA['main_wallet_amount'] - $points - (0.01 * $points);
      $amountMainWalletB = $mainWalletB['main_wallet_amount'] + (0.9 * $points);

      //XU LY VI TIET KIEM A VA B
      $amountEcoWalletA = $ecoWalletA['eco_wallet_amount'] + (0.3 * $points);
      $amountEcoWalletB = $ecoWalletB['eco_wallet_amount'] + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $amountLvlWalletA = $lvlWalletA['level_wallet_amount'] - $points;
      $amountLvlWalletB = $lvlWalletB['level_wallet_amount'] + (0.9 * $points);

      WalletMain::where('main_wallet_ofuser', $id)->update(['main_wallet_amount' => $amountMainWalletA]);
      WalletEco::where('eco_wallet_ofuser', $id)->update(['eco_wallet_amount' => $amountEcoWalletA]);
      WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_amount' => $amountLvlWalletA]);


      WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->update(['main_wallet_amount' => $amountMainWalletB]);
      WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->update(['eco_wallet_amount' => $amountEcoWalletB]);
      WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->update(['level_wallet_amount' => $amountLvlWalletB]);
   }

   public function cashBackVeLien($points, $idNguoiNhan)
   {
      $id = auth()->user()->id;
      //lay VI CHINH/VI TK/ VI HM cua user hien tai
      $mainWalletA = WalletMain::where('main_wallet_ofuser', $id)->first()->toArray();
      $mainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->first()->toArray();
      // VI PHU A
      $extWalletA = WalletExt::where('ext_wallet_ofuser', $id)->first()->toArray();
      // VI TIET KIEM B
      $ecoWalletB = WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->first()->toArray();

      $lvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->first()->toArray();
      $lvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->first()->toArray();

      //  XU LY VI CHINH A VA B 
      $amountMainWalletA = $mainWalletA['main_wallet_amount'] - $points - (0.01 * $points);
      $amountMainWalletB = $mainWalletB['main_wallet_amount'] + (0.9 * $points);

      //XU LY VI PHU A
      $amountExtWalletA = $extWalletA['ext_wallet_amount'] + (0.05 * $points);

      //XU LY VI TIET KIEM B
      $amountEcoWalletB = $ecoWalletB['eco_wallet_amount'] + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $amountLvlWalletA = $lvlWalletA['level_wallet_amount'] - $points;
      $amountLvlWalletB = $lvlWalletB['level_wallet_amount'] + (0.9 * $points);

      WalletMain::where('main_wallet_ofuser', $id)->update(['main_wallet_amount' => $amountMainWalletA]);
      WalletExt::where('eco_wallet_ofuser', $id)->update(['ext_wallet_amount' => $amountExtWalletA]);
      WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_amount' => $amountLvlWalletA]);


      WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->update(['main_wallet_amount' => $amountMainWalletB]);
      WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->update(['eco_wallet_amount' => $amountEcoWalletB]);
      WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->update(['level_wallet_amount' => $amountLvlWalletB]);
   }
}
