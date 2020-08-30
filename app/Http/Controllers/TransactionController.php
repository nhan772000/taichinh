<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\WalletEco;
use App\WalletMain;
use App\WalletExt;
use App\WalletLevel;
use App\Transaction;

class TransactionController extends Controller
{
   public function cashBackTietKiem($points, $idNguoiNhan)
   {
      $id = auth()->user()->id;
      //lay VI CHINH/VI TK/ VI HM cua user hien tai
      $amountMainWalletA = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
      $amountMainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->value('main_wallet_amount');

      $amountEcoWalletA = WalletEco::where('eco_wallet_ofuser', $id)->value('eco_wallet_amount');
      $amountEcoWalletB = WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->value('eco_wallet_amount');

      $amountLvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_ofuser');
      $amountLvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->value('level_wallet_ofuser');

      //  XU LY VI CHINH A VA B 
      $amountMainWalletA = $amountMainWalletA - $points - (0.01 * $points);
      $amountMainWalletB = $amountMainWalletB + (0.9 * $points);

      //XU LY VI TIET KIEM A VA B
      $amountEcoWalletA = $amountEcoWalletA + (0.3 * $points);
      $amountEcoWalletB = $amountEcoWalletB + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $amountLvlWalletA = $amountLvlWalletA - $points;
      $amountLvlWalletB = $amountLvlWalletB + (0.9 * $points);

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
      $amountMainWalletA = WalletMain::where('main_wallet_ofuser', $id)->value('main_wallet_amount');
      $amountMainWalletB = WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->value('main_wallet_amount');
      // VI PHU A
      $amountExtWalletA = WalletExt::where('ext_wallet_ofuser', $id)->value('ext_wallet_amount');
      // VI TIET KIEM B
      $amountEcoWalletB =  WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->value('eco_wallet_amount');

      $amountLvlWalletA = WalletLevel::where('level_wallet_ofuser', $id)->value('level_wallet_amount');
      $amountLvlWalletB = WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->value('level_wallet_amount');

      //  XU LY VI CHINH A VA B 
      $amountMainWalletA = $amountMainWalletA - $points - (0.01 * $points);
      $amountMainWalletB = $amountMainWalletA + (0.9 * $points);

      //XU LY VI PHU A
      $amountExtWalletA =  $amountExtWalletA + (0.05 * $points);

      //XU LY VI TIET KIEM B
      $amountEcoWalletB =$amountEcoWalletB + (0.1 * $points);

      //XU LY VI HAN MUC A VA B
      $amountLvlWalletA = $amountLvlWalletA - $points;
      $amountLvlWalletB =$amountLvlWalletB + (0.9 * $points);

      WalletMain::where('main_wallet_ofuser', $id)->update(['main_wallet_amount' => $amountMainWalletA]);
      WalletExt::where('ext_wallet_ofuser', $id)->update(['ext_wallet_amount' => $amountExtWalletA]);
      WalletLevel::where('level_wallet_ofuser', $id)->update(['level_wallet_amount' => $amountLvlWalletA]);


      WalletMain::where('main_wallet_ofuser', $idNguoiNhan)->update(['main_wallet_amount' => $amountMainWalletB]);
      WalletEco::where('eco_wallet_ofuser', $idNguoiNhan)->update(['eco_wallet_amount' => $amountEcoWalletB]);
      WalletLevel::where('level_wallet_ofuser', $idNguoiNhan)->update(['level_wallet_amount' => $amountLvlWalletB]);
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
}