<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\Http\Requests;
use App\WalletLevel;
use App\WalletMain;
use App\WalletExt;
use App\WalletEco;
use App\User;

class WalletLevelController extends Controller
{
   public function ExampleFunction(Request $request)
   {
      $id = auth()->user()->id;
      //lấy dữ liệu ví chính
      $mainwallet = WalletMain::where("main_wallet_ofuser",$id)->value('main_wallet_amount');
      //lấy dữ liệu ví phụ
      $extwallet = WalletExt::where("ext_wallet_ofuser",$id)->value('ext_wallet_amount');
      //lấy dữ liệu từ ví hạn mức
      $levelwallet = WalletLevel::where("level_wallet_ofuser",$id)->value("level_wallet_amount");
   
      $pointHM = $request['point'];
      //check form
      $rule =[
         'point' => 'required|numeric|max:999'
      ];
      $message = [
         'point.numeric' => 'Bắt buộc phải là số'
      ];
      $validator = Validator::make($request->all(),$rule,$message);
      //check password
      $data = [
         'password' => $request->pwdtt,
      ];
      if(Auth::attempt($data)){
         if($mainwallet == 0 && $extwallet == 0){
            echo "Bạn cần phải nạp tiền";
        }
        else {
           if($request->muahangmuc == 'otp_vichinh'){
              //phi dich vu
              $phiService = ($mainwallet - $pointHM)*1/100;
              //tru diem vi chinh
              $resultMainWallet =  $mainwallet - $pointHM - $phiService;
     
     
              //update hạn mức đã nạp
              WalletLevel::where('level_wallet_ofuser', '=', $id)->update(['level_wallet_amount' => $levelwallet+$pointHM]);
              //update số tiền ví chính bị trừ
              WalletMain::where('main_wallet_ofuser', '=', $id)->update(['main_wallet_amount' => $resultMainWallet]);
              return redirect('/tangHM')->with('success','Tăng Hạn Mức thành công');
           }
           elseif($request->muahangmuc == 'otp_viphu'){
              //phi dich vu
              $phiService = ($extwallet - $pointHM)*1/100;
              //so diem han muc da nap
              $resultPoint = ($extwallet - $pointHM) - $phiService;
              //tru diem vi chinh
              $resultExtWallet =  $extwallet - $pointHM;
              
              //update hạn mức đã nạp
              WalletLevel::where('level_wallet_ofuser', '=', $id)->update(['level_wallet_amount' => $pointHM]);
              //update số tiền ví phụ bị trừ
              WalletExt::where('ext_wallet_ofuser', '=', $id)->update(['ext_wallet_amount' => $levelwallet+$resultExtWallet]);
              return redirect('/tangHM')->with('success','Tăng Hạn Mức thành công');
           }  
        }
      }
      else{
         return redirect('/tangHM')->with('mess','Thông tin đăng nhập không chính xác');
      }
      if( $validator->fails()){
         return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
      }
   }
}