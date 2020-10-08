<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\User;
use App\Notice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Mail;
use App\SettingMarketDev;
use App\WalletEco;
use App\WalletMain;
use App\WalletExt;
use App\WalletLevel;
use App\SettingTransferPoint;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class WalletLevelController extends Controller
{
   public function tangHanMuc(Request $request)
   {
      $id = auth()->user()->id;
      //lấy dữ liệu ví chính
      $mainwallet = WalletMain::where("main_wallet_ofuser",$id)->value('main_wallet_point');
      //lấy dữ liệu ví phụ
      $extwallet = WalletExt::where("ext_wallet_ofuser",$id)->value('ext_wallet_point');
      //lấy dữ liệu từ ví hạn mức
      $levelwallet = WalletLevel::where("hm_wallet_ofuser",$id)->value("hm_wallet_point");
         $pointHM = $request['point'];
         //check form
         $rule =[
            'point' => 'required|numeric|max:255'
         ];
         $message = [
            'point.numeric' => 'Bắt buộc phải là số'
         ];
         $validator = Validator::make($request->all(),$rule,$message);
         if( $validator->fails()){
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
         }
         else if($mainwallet == 0){
             echo "Bạn cần phải nạp tiền";
         }
         else{
            if($request->muahangmuc == 'otp_vichinh'){
               //phi dich vu
                $phiService = ($mainwallet - $pointHM)*1/100;
               //tru diem vi chinh
               $resultMainWallet =  $mainwallet - $pointHM - $phiService;

      
               //update hạn mức đã nạp
               WalletLevel::where('hm_wallet_ofuser', '=', $id)->update(['hm_wallet_point' => $levelwallet+$pointHM]);
               //update số tiền ví chính bị trừ
               WalletMain::where('main_wallet_ofuser', '=', $id)->update(['main_wallet_point' => $resultMainWallet]);
               return redirect('/tangHM')->with('success','Tăng Hạn Mức thành công');
        }
            else if($request->muahangmuc == 'otp_viphu'){
               //phi dich vu
               $phiService = ($extwallet - $pointHM)*1/100;
               //so diem han muc da nap
               $resultPoint = ($extwallet - $pointHM) - $phiService;
               //tru diem vi chinh
               $resultExtWallet =  $extwallet - $pointHM;
               //update hạn mức đã nạp
               WalletLevel::where('hm_wallet_ofuser', '=', $id)->update(['hm_wallet_point' => $pointHM]);
               //update số tiền ví phụ bị trừ
               WalletExt::where('ext_wallet_ofuser', '=', $id)->update(['ext_wallet_point' => $levelwallet+$resultExtWallet]);
               return redirect('/tangHM')->with('success','Tăng Hạn Mức thành công');
            }  
         }
   }
}