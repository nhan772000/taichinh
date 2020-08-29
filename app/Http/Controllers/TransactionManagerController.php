<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\WalletEco;
use App\WalletMain;

use Illuminate\Pagination\Paginator;

class TransactionManagerController extends Controller
{
    public function ShowAllTransaction()
   {        
        $transactions = DB::table('transaction')-> orderBy('created_at', 'desc')->paginate(10);
        return view('back-end.transactionmanager', ['transactions' => $transactions]);
   }


    public function acceptTransaction(Request $request){
            $transaction_id = $request->id;
            $transaction_ofuser = $request->ofuser;
            $point = $request->point;
            $id_checker = Auth::user()->id;  
            $wallet_main_amount = WalletMain::where('main_wallet_ofuser', $transaction_ofuser)->value('main_wallet_amount');
            $wallet_eco_amount = WalletEco::where('eco_wallet_ofuser', $transaction_ofuser)->value('eco_wallet_amount');

            $wallet_main_amount = $wallet_main_amount + 11111;
            $wallet_eco_amount = $wallet_eco_amount + 1111;

            WalletMain::where('main_wallet_ofuser',$transaction_ofuser)->update(['main_wallet_amount' => 22222]);
            WalletEco::where('eco_wallet_ofuser',$transaction_ofuser)->update(['eco_wallet_amount' => 2222]);

            Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 1]);
            return $point;
        }
    public function cancelTransaction(Request $request){
            $transaction_id = $request->id;
            $id_checker = Auth::user()->id;  
            Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 2]);
            return null;
        }
    public function deleteTransaction(Request $request){
        $transaction_id = $request->id;
        DB::table('transaction')->delete($transaction_id);

        return null;
    }
}
