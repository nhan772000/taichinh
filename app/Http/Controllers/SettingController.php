<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
use App\Notice;
use Illuminate\Support\Facades\DB;

use Mail;
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
class SettingController extends Controller
{
    public function getGift(Request $request){
        //lấy ngày h hiện tại
        $datetimeNow = Carbon::now('Asia/Ho_Chi_Minh');
        //lấy du lieu mysql
        $id = auth()->user()->id;
        $daygift = User::where('id',$id)->value('dategift');
        //lấy dữ liệu các ví tiết kiệm
        $ecowallet = DB::table('eco_wallet')->where('eco_wallet_ofuser',$id)->value('eco_wallet_point');
        //lấy dữ liệu từ ví phụ
        $extwallet = DB::table('ext_wallet')->where('ext_wallet_ofuser',$id)->value('ext_wallet_point');
        //lấy ngày đăng nhập
        $daylogin = User::where('id',$id)->value('datelogin');
        //lấy ngày nhận thưởng
        $daygift = User::where('id',$id)->value('dategift');
        if( $daylogin == $daygift ) {
            if( $ecowallet >= 0 && $ecowallet <= 2000){
              //Số điểm tặng thưởng
              $pointGift =  ($ecowallet * 1)/100;
              //trừ 1% từ ví tiết kiệm
              $ecowalletDown = WalletEco::where('eco_wallet_ofuser','=',$id)->update([
                'eco_wallet_point' =>  $ecowallet - $pointGift
              ]);
              //chuyển 1% từ ví tiết kiệm sang ví phụ
              $extwalletGift = WalletExt::where('ext_wallet_ofuser','=',$id)->update([
                'ext_wallet_point' =>  $extwallet + $pointGift
              ]);
              $daygift = User::where('id',$id)->update([
                 'dategift' => $datetimeNow->addDays(1)
              ]);
            }
            elseif( $ecowallet >= 2001 && $ecowallet <= 10000){
              //Số điểm tặng thưởng
              $pointGift =  ($ecowallet * 0.3)/100;
              //trừ 1% từ ví tiết kiệm
              $ecowalletDown = WalletEco::where('eco_wallet_ofuser','=',$id)->update([
                'eco_wallet_point' =>  $ecowallet - $pointGift
              ]);
              //chuyển 1% từ ví tiết kiệm sang ví phụ
              $extwalletGift = WalletExt::where('ext_wallet_ofuser','=',$id)->update([
                'ext_wallet_point' =>  $extwallet + $pointGift
              ]);
              $daygift = User::where('id',$id)->update([
                 'dategift' => $datetimeNow->addDays(1)
              ]);
            }
            elseif( $ecowallet >= 10001 && $ecowallet <= 50000){
              //Số điểm tặng thưởng
              $pointGift =  ($ecowallet * 0.1)/100;
              //trừ 1% từ ví tiết kiệm
              $ecowalletDown = WalletEco::where('eco_wallet_ofuser','=',$id)->update([
                'eco_wallet_point' =>  $ecowallet - $pointGift
              ]);
              //chuyển 1% từ ví tiết kiệm sang ví phụ
              $extwalletGift = WalletExt::where('ext_wallet_ofuser','=',$id)->update([
                'ext_wallet_point' =>  $extwallet + $pointGift
              ]);
              $daygift = User::where('id',$id)->update([
                 'dategift' => $datetimeNow->addDays(1)
              ]);
            }
            elseif( $ecowallet >= 50001){
              //Số điểm tặng thưởng
              $pointGift =  ($ecowallet * 0.05)/100;
              //trừ 1% từ ví tiết kiệm
              $ecowalletDown = WalletEco::where('eco_wallet_ofuser','=',$id)->update([
                'eco_wallet_point' =>  $ecowallet - $pointGift
              ]);
              //chuyển 1% từ ví tiết kiệm sang ví phụ
              $extwalletGift = WalletExt::where('ext_wallet_ofuser','=',$id)->update([
                'ext_wallet_point' =>  $extwallet + $pointGift
              ]);
              $daygift = User::where('id',$id)->update([
                 'dategift' => $datetimeNow->addDays(1)
              ]);
            }
          }
          return Redirect::to('/');
    }
}
