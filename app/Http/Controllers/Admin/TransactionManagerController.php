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
use App\Http\Controllers\WalletMainController;

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
        $id_checker = Auth::guard('admin')->user()->id;
        $transactions = DB::table('transaction')-> where('transaction_typeorder', 0)->orWhere('transaction_typeorder', 1)-> orderBy('created_at', 'desc')->get();
        return view('back-end.transactionmanager', ['transactions' => $transactions]);
   }
   public function getDepositTransaction()
   {                    
        $id_checker = Auth::guard('admin')->user()->id;
        $transactions = DB::table('transaction')-> where('transaction_typeorder', 1)->orderBy('created_at', 'desc')->get();
        return view('back-end.deposittransactionmanager', ['transactions' => $transactions]);
   }

   public function getWithdrawTransaction()
   {                    
        $id_checker = Auth::guard('admin')->user()->id;
        $transactions = DB::table('transaction')-> where('transaction_typeorder', 0)->orderBy('created_at', 'desc')->get();
        return view('back-end.withdrawtransactionmanager', ['transactions' => $transactions]);
   }


    public function acceptTransaction(Request $request){
            $id_checker = Auth::guard('admin')->user()->id;
            $arr_id = $request->arr_id;
            $arr_ids = [];
            if(is_array($arr_id)){
                $arr_ids = $arr_id;
            }else{
                $arr_ids[0] = $arr_id;
            }

            foreach ($arr_ids as $transaction_id){
                $transaction = Transaction::where('transaction_id', $transaction_id)->first();
                
                    if($transaction->transaction_typeorder == 0 ){
                        $wallet_main = WalletMain::where('main_wallet_ofuser', $transaction->transaction_fromuser)->first();
                        
                        $wallet_main_amount = $wallet_main->main_wallet_amount - $transaction->transaction_point;
        
                        WalletMain::where('main_wallet_ofuser',$transaction->transaction_fromuser)->update(['main_wallet_amount' => $wallet_main_amount]);
                        Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 1]);
                        $walletmainController = new WalletMainController();
                        $walletmainController->createWalletHistory($transaction->transaction_point, $transaction->transaction_fromuser, $transaction->transaction_fromuser, $wallet_main->main_wallet_id, 0, 0 , 0);      
                    }
                    elseif($transaction->transaction_typeorder == 1){
                        $wallet_main = WalletMain::where('main_wallet_ofuser', $transaction->transaction_touser)->first();
                        $wallet_eco = WalletEco::where('eco_wallet_ofuser', $transaction->transaction_touser)->first();
        
                        $wallet_main_amount = $wallet_main->wallet_main_amount + ($transaction->transaction_point*9/10);
                        $wallet_eco_amount = $wallet_eco->wallet_eco_amount + ($transaction->transaction_point/10);
        
                        WalletMain::where('main_wallet_ofuser',$transaction->transaction_touser)->update(['main_wallet_amount' => $wallet_main_amount]);
                        WalletEco::where('eco_wallet_ofuser',$transaction->transaction_touser)->update(['eco_wallet_amount' => $wallet_eco_amount]);
        
                        Transaction::where('transaction_id',$transaction_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 1]);
                        $walletmainController = new WalletMainController();
                        $walletmainController->createWalletHistory(($transaction->transaction_point)*9/10, $transaction->transaction_touser, $transaction->transaction_touser, $wallet_main->main_wallet_id, 0, 1 , 1);      
                        $walletmainController->createWalletHistory(($transaction->transaction_point)/10, $transaction->transaction_touser, $transaction->transaction_touser, $wallet_main->main_wallet_id, 2, 1 , 1);      

                    }
                
                
            }
            return null;
        }
    public function cancelTransaction(Request $request){
            $arr_id = $request->arr_id;
            $id_checker = Auth::guard('admin')->user()->id;
            if(is_array($arr_id)){
                foreach ($arr_id as $id){
                    $transaction_status = Transaction::where('transaction_id', $id)->value('transaction_status');
                    if($transaction_status == 0){
                        Transaction::where('transaction_id',$id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 2]);
                    }
                }
            }else{
                    Transaction::where('transaction_id',$arr_id)->update(['transaction_checker' => $id_checker, 'transaction_status' => 2]);
            }
            return null;
        }
    public function deleteTransaction(Request $request){
        $arr_id = $request->arr_id;
        if(is_array($arr_id)){
            foreach ($arr_id as $id){
                DB::table('transaction')->where('transaction_id', $id)->delete();
            }
        }else{
            DB::table('transaction')->where('transaction_id', $arr_id)->delete();
        }
        
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

        if ($request->file('transaction_bill') != null){
            $destinationPath = 'uploads/imgChuyenKhoan/';
            $file = $request->file('transaction_bill'); 
            $file_name = $file->getClientOriginalName(); 
            $file->move($destinationPath , $file_name); 

            $url_phieuCK = $destinationPath. "" .$file_name;
            Transaction::where('transaction_id',$transaction_id)->update([
                'transaction_bill' => $url_phieuCK
            ]);
        }
        if ($request->file('transaction_bill2') != null){
            $destinationPath = 'uploads/imgChuyenKhoan/';
            $file = $request->file('transaction_bill2'); 
            $file_name = $file->getClientOriginalName(); 
            $file->move($destinationPath , $file_name); 

            $url_phieuCK2 = $destinationPath. "" .$file_name;
            Transaction::where('transaction_id',$transaction_id)->update([
                'transaction_bill2' => $url_phieuCK2
            ]);
        }
        
        Transaction::where('transaction_id',$transaction_id)->update([
            'transaction_fromuser' => $request->transaction_fromuser,
            'transaction_touser' => $request->transaction_touser,
            'transaction_checker' => $request->transaction_checker,
            'transaction_typecurrency' => $request->transaction_typecurrency,
            'transaction_point' => $request->transaction_point,
            'transaction_description' => $request->transaction_description,
            'transaction_status' => $request->transaction_status,
            'updated_at' =>date('Y-m-d G:i:s')
        ]);


        return back()->with('success','Updated');
   }
  
        

 
}
