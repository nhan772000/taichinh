<?php
namespace App\Http\Controllers\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Admin_users;
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
            $type = $request->type;
            if($type ==0){
                $id_checker = Auth::user()->id;  
                $wallet_main_amount = WalletMain::where('main_wallet_ofuser', $transaction_ofuser)->value('main_wallet_amount');

                $wallet_main_amount = $wallet_main_amount -$point;

                WalletMain::where('main_wallet_ofuser',$transaction_ofuser)->update(['main_wallet_amount' => $wallet_main_amount]);
                Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 1]);
                return $point;
            }
            elseif($type ==1){
                $id_checker = Auth::user()->id;  
                $wallet_main_amount = WalletMain::where('main_wallet_ofuser', $transaction_ofuser)->value('main_wallet_amount');
                $wallet_eco_amount = WalletEco::where('eco_wallet_ofuser', $transaction_ofuser)->value('eco_wallet_amount');

                $wallet_main_amount = $wallet_main_amount + ($point*9/10);
                $wallet_eco_amount = $wallet_eco_amount + ($point/10);

                WalletMain::where('main_wallet_ofuser',$transaction_ofuser)->update(['main_wallet_amount' => $wallet_main_amount]);
                WalletEco::where('eco_wallet_ofuser',$transaction_ofuser)->update(['eco_wallet_amount' => $wallet_eco_amount]);

                Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 1]);
                return $point;
            }
          
        }
    public function cancelTransaction(Request $request){
            $transaction_id = $request->id;
            $id_checker = Auth::user()->id;  
            Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 2]);
            return null;
        }
    public function deleteTransaction(Request $request){
        $transaction_id = $request->id;
        DB::table('transaction')->where('transaction_id', $transaction_id)->delete();
        return null;
    }
     public function getEditTransaction(Request $request)
   {        
            $transaction_id = $request->id;
            $transaction = DB::table('transaction')->where('transaction_id', $transaction_id)->get();


        return view('back-end.editTransaction',['transaction'=> $transaction]);
   }
        public function postEditTransaction(Request $request)
   {        
            $transaction_id = $request->transaction_id;
                Transaction::where('transaction_id',$transaction_id)->update([
                    'transaction_ofuser' => $request->transaction_ofuser,
                    'transaction_order' => $request->transaction_order,
                    'transaction_checker' => $request->transaction_checker,
                    'transaction_type' => $request->transaction_type,
                    'transaction_point' => $request->transaction_point,
                    'transaction_description' => $request->transaction_description,
                    'transaction_status' => $request->transaction_status

                ]);


            return back()->with('success','Updated');
   }
}
