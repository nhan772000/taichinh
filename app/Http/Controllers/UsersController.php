<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
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
session_start();

class UsersController extends Controller
{

   public function getlist()
   {
   		$data = User::paginate(10);
    	return view('back-end.users.list',['data'=>$data]);
   }
   public function getedit($id)
   {
   		$data = User::where('id',$id)->first();
   		return view('back-end.users.edit',['data'=>$data]);
   }
   public function Phattrienthitruong(){
      return view('phattrienthitruong');
   }

    public function getChuyen(){

    if(Auth::check()){
      $user = Auth::user();
      $point_main = WalletMain::where('main_wallet_ofuser', $user->id)->first();
      $point_ext = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
      $hm = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();

      $point_main_check = $user->user_point_everyday;

      if($hm->hm_wallet_point < $point_main_check){
        $point_main_check = $hm->hm_wallet_point;
      }
      if($point_main->main_wallet_point < $point_main_check){
        $point_main_check = $point_main->main_wallet_point;
      }

      $point_ext_check = $user->user_point_everyday;
      if($hm->hm_wallet_point < $point_ext_check){
        $point_ext_check = $hm->hm_wallet_point;
      }
      if($point_ext->ext_wallet_point < $point_ext_check){
        $point_ext_check = $point_ext->ext_wallet_point;
      }
      
      return view('chuyen')->with('point_main', $point_main_check)->with('point_ext', $point_ext_check);
    }
  }
  //get info user recei ajax
  public function infoUserRecei($user_id){
    $user = User::where('id', $user_id)->first();
    if($user){
      echo '<p class="alert alert-warning vivify rollInRight">Tên:'.$user->user_name.'<br/>User Type: '.$user->user_type.'</p>';
    }
    else{
      echo '<p class="alert alert-warning vivify rollInRight">No user member.</p>';
    }
    
  }



  //getchuyenQR by Kira
  public function getChuyenQR(Request $request){

    if(Auth::check()){
      $user = Auth::user();
      $point_main = WalletMain::where('main_wallet_ofuser', $user->id)->first();
      $point_ext = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
      $hm = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();
      if($hm->hm_wallet_point > $point_main->main_wallet_point){
        $point_main = $point_main->main_wallet_point;
      }
      else{
        $point_main = $hm->hm_wallet_point;
      }
      if($hm->hm_wallet_point > $point_ext->ext_wallet_point){
        $point_ext = $point_ext->ext_wallet_point;
      }
      else{
        $point_ext = $hm->hm_wallet_point;
      }
      return view('chuyenqr')->with('point_main', $point_main)->with('point_ext', $point_ext)->with('id_recei', $request->id);
    }
  }
  public function postChuyen(Request $request){
    //user_choosewallet, id_user_transfer, point_transfer, transfer_content, user_password_pay
    if(Auth::check()){



      $this->validate($request, [
        'user_choosewallet' => 'required',
        'id_user_transfer' => ['required', 'max:255', 'regex:^[0-9]+$^'],
        'point_transfer' => ['required', 'max:255', 'regex:^[0-9]+$^'],
        'transfer_content' => 'max:1024',
        'user_password_pay' => 'required|max:255'
      ],
      [
      ]);
      $user = Auth::user();
      $main_wallet = WalletMain::where('main_wallet_ofuser', $user->id)->first();
      $ext_wallet = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
      $hm = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();

      $user_transfer_point = User::find($request->id_user_transfer);
        if($request->user_choosewallet == 1){
          $wallet_point = $user->user_point_everyday;

          if($hm->hm_wallet_point < $wallet_point){
            $wallet_point = $hm->hm_wallet_point;
          }
          if($main_wallet->main_wallet_point < $wallet_point){
            $wallet_point = $main_wallet->main_wallet_point;
          }
        }

        else if($request->user_choosewallet == 0){
          $wallet_point = $user->user_point_everyday;

          if($hm->hm_wallet_point < $wallet_point){
            $wallet_point = $hm->hm_wallet_point;
          }
          if($ext_wallet->ext_wallet_point < $wallet_point){
            $wallet_point = $ext_wallet->ext_wallet_point;
          }
        }
        
        else{
          Auth::logout();
          return Redirect::to('login');
        }
        //kiểm tra xem có đủ điểm để chuyển không
        if($wallet_point > 0 && $wallet_point > ($request->point_transfer + 10) && $request->point_transfer > 1){

            //kiểm tra user chuyển có tồn tại không
            if($user_transfer_point){

              //kiểm tra mật khẩu thanh toán
              if (Hash::check($request->user_password_pay, $user->user_password_pay)) {
                return view('/xacnhan_chuyen')->with('data', $request)->with('user', Auth::user())->with('user_transfer_point', $user_transfer_point);
              }
              else{
                Session::flash('message', 'Mật khẩu thanh toán không đúng.');
                return Redirect::to('/chuyen');
              }
              //------kiểm tra mật khẩu thanh toán
            }
            else{
              Session::flash('message', 'ID member không đúng');
              return Redirect::to('/chuyen');
            }
            //-----kiểm tra user chuyển có tồn tại không
        }
        else{
          Session::flash('message', 'bạn không đủ điều kiệm');
          return Redirect::to('/chuyen');
        }
        //-------kiểm tra xem có đủ điểm để chuyển không     
    }
    else{
      Session::flash('message', 'Vui lòng đăng nhập !');
      return Redirect::to('/login');
    }
  }

  public function xacNhanChuyen(Request $request){
    //id_transfer, type_wallet, point_transfer
    if(Auth::check()){
      


      $walletMainController = new walletMainController();
      $point = $request->point_transfer;

      $user = Auth::user();

      //update point everyday
      $user->user_point_everyday = $user->user_point_everyday - $request->point_transfer;
      $user->save();

      $fromuser = $user->id;
      $touser = $request->id_transfer;
      $user_transfer_point = User::find($request->id_transfer);

      $user_setting = SettingTransferPoint::where('setting_ofuser', $user->id)->first();

      //người dùng cài đặt hoàn về 30% tiết kiệm
      if($user_setting->setting_type == 0){
        //ví của người dùng chuyển
        //xử lý khi người dùng chọn ví chuyển điểm
        if($request->type_wallet == 1){
          $main_wallet_transfer = WalletMain::where('main_wallet_ofuser', $user->id)->first();

          $ofwallet = $main_wallet_transfer->main_wallet_id;
          $typewallet = 0;

          $main_point = $request->point_transfer * ( 1 / 100 );
          $main_point = $main_wallet_transfer->main_wallet_point - $request->point_transfer - $main_point;
          $main_point = sprintf("%1.2f", $main_point);
          // echo $main_point;
          // echo "<br/>";
          $main_wallet_transfer_save = WalletMain::find($main_wallet_transfer->main_wallet_id);

          $main_wallet_transfer_save->main_wallet_point = $main_point;
          $main_wallet_transfer_save->save();



        }
        else if($request->type_wallet == 0){
          $ext_wallet_transfer = WalletExt::where('ext_wallet_ofuser', $user->id)->first();

          $ofwallet = $ext_wallet_transfer->ext_wallet_id;
          $typewallet = 1;

          $ext_wallet = $request->point_transfer * ( 1 / 100 );
          $ext_wallet = $ext_wallet_transfer->ext_wallet_point - $request->point_transfer - $ext_wallet;
          $ext_wallet = sprintf("%1.2f", $ext_wallet);
          // echo $ext_wallet;
          // echo "<br/>";
          $ext_wallet_transfer_save = WalletExt::find($ext_wallet_transfer->ext_wallet_id);

          $ext_wallet_transfer_save->ext_wallet_point = $ext_wallet;
          $ext_wallet_transfer_save->save();


        }

        else{
        Auth::logout();
        return Redirect::to('login');
        }
        //---------------xử lý khi người dùng chọn ví chuyển điểm





        $eco_wallet_transfer = WalletEco::where('eco_wallet_ofuser', $user->id)->first();
         $eco_point = $request->point_transfer*(30/100);
        $eco_point = $eco_wallet_transfer->eco_wallet_point + $eco_point;
        $eco_point = sprintf("%1.2f", $eco_point);
        //echo sprintf("%1.2f",$eco_point);
        //echo "<br/>";
        $eco_wallet_transfer_save = WalletEco::find($eco_wallet_transfer->eco_wallet_id);
        $eco_wallet_transfer_save->eco_wallet_point = $eco_point;
        $eco_wallet_transfer_save->save();

        $hm_transfer = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();
         $hm_point = $hm_transfer->hm_wallet_point - $request->point_transfer;
        //echo sprintf("%1.2f", $hm_point);
         $hm_point = sprintf("%1.2f", $hm_point);
        $hm_transfer_save = WalletLevel::find($hm_transfer->hm_wallet_id);
        $hm_transfer_save->hm_wallet_point = $hm_point;
        $hm_transfer_save->save();
        //echo "<br/>";

      }


      //người dùng cài đặt hoàn liền 5%
      else if($user_setting->setting_type == 1){

        //ví của người dùng chuyển

        //kết thúc------------xử lý khi chọn ví------------
        if($request->type_wallet == 1){
          $main_wallet_transfer = WalletMain::where('main_wallet_ofuser', $user->id)->first();

          $ofwallet = $main_wallet_transfer->main_wallet_id;
          $typewallet = 0;

          $main_point = $request->point_transfer * ( 1 / 100 );
          $main_point = $main_wallet_transfer->main_wallet_point - $request->point_transfer - $main_point;
          $main_point = sprintf("%1.2f", $main_point);
          // echo $main_point;
          // echo "<br/>";
          $main_wallet_transfer_save = WalletMain::find($main_wallet_transfer->main_wallet_id);

          $main_wallet_transfer_save->main_wallet_point = $main_point;
          $main_wallet_transfer_save->save();



        }
        else if($request->type_wallet == 0){
          $ext_wallet_transfer = WalletExt::where('ext_wallet_ofuser', $user->id)->first();

          $ofwallet = $ext_wallet_transfer->ext_wallet_id;
          $typewallet = 1;

          $ext_wallet = $request->point_transfer * ( 1 / 100 );
          $ext_wallet = $ext_wallet_transfer->ext_wallet_point - $request->point_transfer - $ext_wallet;
          $ext_wallet = sprintf("%1.2f", $ext_wallet);
          // echo $ext_wallet;
          // echo "<br/>";
          $ext_wallet_transfer_save = WalletExt::find($ext_wallet_transfer->ext_wallet_id);

          $ext_wallet_transfer_save->ext_wallet_point = $ext_wallet;
          $ext_wallet_transfer_save->save();


        }

        else{
          Auth::logout();
          return Redirect::to('login');
        }
        //kết thúc------------xử lý khi chọn ví------------






        $ext_wallet_transfer = WalletExt::where('ext_wallet_ofuser', $user->id)->first();
        $ext_point = $request->point_transfer*(5/100);
        $ext_point = $ext_wallet_transfer->ext_wallet_point + $ext_point;
        $ext_point = sprintf("%1.2f", $ext_point);
        //echo sprintf("%1.2f",$eco_point);
        //echo "<br/>";
        $ext_wallet_transfer_save = WalletExt::find($ext_wallet_transfer->ext_wallet_id);
        $ext_wallet_transfer_save->ext_wallet_point = $ext_point;
        $ext_wallet_transfer_save->save();

        $hm_transfer = WalletLevel::where('hm_wallet_ofuser', $user->id)->first();
         $hm_point = $hm_transfer->hm_wallet_point - $request->point_transfer;
        //echo sprintf("%1.2f", $hm_point);
         $hm_point = sprintf("%1.2f", $hm_point);
        $hm_transfer_save = WalletLevel::find($hm_transfer->hm_wallet_id);
        $hm_transfer_save->hm_wallet_point = $hm_point;
        $hm_transfer_save->save();
        //echo "<br/>";

      }
      $walletMainController->createWalletHistory($point, $fromuser, $touser, $ofwallet, $typewallet, 1, 2);
      //kết thúc--------------cài đặt hoàn về liền----------------



        //ví của người dùng nhận
        $main_wallet_receive = WalletMain::where('main_wallet_ofuser', $user_transfer_point->id)->first();

        $main_point = $request->point_transfer * (90/100);
        $main_point = $main_wallet_receive->main_wallet_point + $main_point;
        $main_point = sprintf("%1.2f", $main_point);
        // echo sprintf("%1.2f",$main_point);
        // echo "<br/>";
        $main_wallet_receive_save = WalletMain::find($main_wallet_receive->main_wallet_id);
        $main_wallet_receive_save->main_wallet_point = $main_point;
        $main_wallet_receive_save->save();

        $eco_wallet_receive = WalletEco::where('eco_wallet_ofuser', $user_transfer_point->id)->first();
         $eco_point = $request->point_transfer*(10/100);
        $eco_point = $eco_wallet_receive->eco_wallet_point + $eco_point;
         $eco_point = sprintf("%1.2f", $eco_point);
        // echo sprintf("%1.2f",$eco_point);
        // echo "<br/>";
        $eco_wallet_receive_save = WalletEco::find($eco_wallet_receive->eco_wallet_id);
        $eco_wallet_receive_save->eco_wallet_point = $eco_point;
        $eco_wallet_receive_save->save();

        $hm_receive = WalletLevel::where('hm_wallet_ofuser', $user_transfer_point->id)->first();
        $hm_point = $hm_receive->hm_wallet_point + $request->point_transfer*(90/100);
         $hm_point = sprintf("%1.2f", $hm_point);
        // echo sprintf("%1.2f",$hm_point);
        // echo "<br/>";
        $hm_receive_save = WalletLevel::find($hm_receive->hm_wallet_id);
        $hm_receive_save->hm_wallet_point = $hm_point;
        $hm_receive_save->save();

        $walletMainController->createWalletHistory($point, $fromuser, $touser, $ofwallet, $typewallet, 0, 2);

      Session::flash('message', 'Bạn đã chuyển điểm thành công');
      return Redirect::to('/chuyen');

    }
    else{
      Session::flash('message', 'Vui lòng đăng nhập !');
      return Redirect::to('/login');
    }

  }

  //ket thuc------------chuyen--------------------------

  //-------------------lấy lại mật khẩu------------------------

  //hiển thị giao diện nhập email
  public function passwordReset(){
    if(!Auth::check()){
      return view('auth.passwords.passwordreset');
    }else{
      return Redirect::to('/');
    }
  }
// xử lý trả về thông tin người dùng
  public function postPasswordReset(Request $request){
    $this->validate($request, [
      'user_email' => 'required'
    ],
    [
      'user_name.required' => 'Bạn chưa nhập email'
    ]);
    $user = User::where('email', '=', $request->user_email)->first();
    if($user){
      return view('auth.passwords.check_account_user')->with('user', $user);
    }
    else{
      Session::flash('message', 'Email này không thuộc tài khoản nào.');
      return Redirect::to('/passwordreset');
    }
  }

//gửi mã xác nhận về email
  public function passwordResetSendMail($remember_token, $user_id){
    $user = User::where('id', '=', $user_id)->where('remember_token', '=', $remember_token)->first();
    if($user){
      $randoom = rand(100000, 999999);
      $user_update_verified = User::find($user->id);
      $user_update_verified->email_verified = $randoom;
      $user_update_verified->save();

      $link_verify_email = '<h3>Dưới đây là mã xác nhận của bạn.</h3><p>Mã xác nhận: '.$randoom.'</p><p style="font-size:16px">----------------------------------------Thân gửi-----------------------------------------</p>"';


      $mail = new PHPMailer(true);
      try{
        $mail->isSMTP();
        $mail->CharSet = 'utf-8';
        $mail->SMTPAuth =true;
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
        $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
        $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
        $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
         $mail->setFrom(env('MY_EMAIL'), env('MY_NAME'));
        //$mail->setFrom('manhdungnguyen2104@gmail.com', 'Trường gửi mail'); 
        $mail->Subject = "Mã xác nhận tài khoản ví điện tử";
        $mail->MsgHTML($link_verify_email);
        $mail->addAddress($user->email , $user->user_name); 
        $mail->send();
      }catch(phpmailerException $e){
        dd($e);
      }catch(Exception $e){
        dd($e);
      }
      if($mail){
        Session::flash('message', 'Chúng tôi đã gửi mã xác nhận về email của bạn.');
        return view('auth.passwords.endgetpassword')->with('remember_token', $user->remember_token)->with('user_id', $user->id);
      }else{

         Session::flash('message', 'Email của bạn có vấn đề. Vui lòng kiểm tra lại !');
        return Redirect::to('/login');
      }

    }
    else{
      Session::flash('message', 'Mời bạn đăng nhập !');
      return Redirect::to('/login');
    }
  }

  //kiểm tra mã xác nhận và cho người dùng nhập lại mật khẩu mới
  public function endGetPassword(Request $request){
    $this->validate($request, [
      'email_verified' => 'required',
      'password' => 'required|min:8|max:32',
      'password_again' => 'required|same:password'
    ],
    [
      'email_verified.required' => 'Mời bạn nhập mã xác nhận',
      'password.required' => 'Bạn chưa nhập mật khẩu',
      'password.min' => 'Để tăng tính bảo mật vui lòng nhập mật khẩu tài khoản ít nhất 8 ký tự',
      'password.max' => 'Mật khẩu của bạn quá dài',
      'password_again.required' => 'Bạn chưa nhập lại mật khẩu',
      'password_again.same' => 'Mật khẩu nhập lại chưa đúng'
    ]);

    $user = User::where('id', '=', $request->user_id)->where('remember_token', '=', $request->remember_token)->where('email_verified', '=', $request->email_verified)->first();
    if($user){
      $user_update_password = User::find($user->id);
      $hash_password = Hash::make($request->password);
      $user_update_password->password = $hash_password;
      $user_update_password->save();
      Session::flash('message', 'Chúc mừng bạn đã lấy lại mật khẩu thành công !');
      return Redirect::to('/login');
    }
    else{
      Session::flash('message', 'Mã xác nhận không đúng !');
      return view('auth.passwords.endgetpassword')->with('remember_token', $request->remember_token)->with('user_id', $request->user_id);
    }

  }







  //kết thúc-------------------lấy lại mật khẩu------------------------




  //------------cập nhật, hiển thị và xác minh thông tin người dùng -------------
  //Khi user truy cập vào link xác minh từ email
  public function receive_email($user_verify_code){
    if(Auth::check())
    {
      $user_auth = Auth::user();

      if($user_verify_code == md5($user_auth->id)){
        $user = User::find($user_auth->id);
        $user->user_type = 1;
        $user->save();
        Session::flash('message', 'Xác minh thành công !');
        return Redirect::to('/userinfo');
      }
      else{
        Session::flash('message', 'Xác minh không thành công !');
        return Redirect::to('/userinfo');
      }
    }
    else{
      Session::flash('message', 'Mời bạn đăng nhập !');
      return Redirect::to('/login');
    }

  }


  //Gửi link xác minh email về mail của user
  public function verify(){
    if(Auth::check()){
      $user = Auth::user();
      $link_verify_email = '<p style="font-size:16px">Để xác minh email từ ví điện tử. Vui lòng truy cập vào link bên dưới ?</p><a style="text-transform: uppercase;text-align: center;background: #0a9f0a;color: white;text-decoration: none;padding: 10px;border-radius: 5px;" href="http://localhost:8080/taichinh/verify/receive-email/'.md5($user->id).'">Verify !</a></p><p style="font-size:16px">----------------------------------------Thân gửi-----------------------------------------</p>';
      echo $link_verify_email;
      $mail = new PHPMailer(true);
      try{
        $mail->isSMTP();
        $mail->CharSet = 'utf-8';
        $mail->SMTPAuth =true;
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
        $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
        $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
        $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
         $mail->setFrom(env('MY_EMAIL'), env('MY_NAME'));
        //$mail->setFrom('manhdungnguyen2104@gmail.com', 'Trường gửi mail'); 
        $mail->Subject = "Xác minh tài khoản ví điện tử";
        $mail->MsgHTML($link_verify_email);
        $mail->addAddress($user->email , $user->user_name); 
        $mail->send();
      }catch(phpmailerException $e){
        dd($e);
      }catch(Exception $e){
        dd($e);
      }
      if($mail){
        Session::flash('message', 'Vui lòng kiểm tra email của bạn để xác minh !');
        return Redirect::to('/userinfo');
      }else{

         Session::flash('message', 'Email của bạn có vấn đề. Vui lòng kiểm tra lại !');
        return Redirect::to('/userinfo');
      }
    }
    else{
      Session::flash('message', 'Mời Bạn đăng nhập !');
      return Redirect::to('/login');
    }
  }



  //cập nhật thông tin người dùng
  public function updateUserInfo(Request $request){
    if(Auth::check()){
      $user_auth = Auth::user();
      $user = User::find($user_auth->id);
      //-----------cập nhật thông tin cơ bản----------
    if(isset($request->update_info_basic)){
      //user_name, user_email, user_phone, user_nation

      if($user_auth->user_type == 0){

        if($user->email != $request->user_email && $user->user_phone != $request->user_phone){
          $this->validate($request, [
            'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],
            'user_email' => ['required', 'min:11', 'max:255', 'email', 'unique:users,email'],
            'user_phone' => ['required', 'numeric', 'unique:users,user_phone', 'regex:/(0)[0-9]{9}/'],
            'user_nation' => ['required']
          ],
          [
          ]);
          $user->user_name = $request->user_name;
          $user->email = $request->user_email;
          $user->user_phone = $request->user_phone;
          $user->user_nation = $request->user_nation;
          $user->save();
          Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
          return Redirect::to('/userinfo');
        }
        else if($user->email != $request->user_email && $user->user_phone == $request->user_phone){
          $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],
        'user_email' => ['required', 'min:11', 'max:255', 'email', 'unique:users,email'],

        'user_nation' => ['required']
      ],
      [
      ]);
          $user->user_name = $request->user_name;
          $user->email = $request->user_email;
          $user->user_nation = $request->user_nation;
          $user->save();
          Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
          return Redirect::to('/userinfo');
        }

        else if($user->email == $request->user_email && $user->user_phone != $request->user_phone){
          $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],

        'user_phone' => ['required', 'numeric', 'unique:users,user_phone', 'regex:/(0)[0-9]{9}/'],
        'user_nation' => ['required']
      ],
      [
      ]);
          $user->user_name = $request->user_name;
          $user->user_phone = $request->user_phone;
          $user->user_nation = $request->user_nation;
          $user->save();
          Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
          return Redirect::to('/userinfo');

        }
        else if($user->email == $request->user_email && $user->user_phone == $request->user_phone){
          $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],

        'user_nation' => ['required']
      ],
      [
      ]);
          $user->user_name = $request->user_name;
          $user->user_nation = $request->user_nation;
          $user->save();
          Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
          return Redirect::to('/userinfo');

        }

      }
      else if($user_auth->user_type == 1){
        if($user->user_phone != $request->user_phone)
        {
          $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],

        'user_phone' => ['required', 'numeric', 'unique:users,user_phone', 'regex:/(0)[0-9]{9}/'],
        'user_nation' => ['required']
      ],
      [
      ]);
        $user->user_name = $request->user_name;
        $user->user_phone = $request->user_phone;
        $user->user_nation = $request->user_nation;
        $user->save();
        Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');
        }
        else{
          $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],


        'user_nation' => ['required']
      ],
      [
      ]);
        $user->user_name = $request->user_name;

        $user->user_nation = $request->user_nation;
        $user->save();
        Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');
        }

      }
      else{
        $this->validate($request, [
        'user_name' => ['required', 'min:3', 'max:255', 'regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9]+$^'],


        'user_nation' => ['required']
      ],
      [
      ]);
        $user->user_name = $request->user_name;
        $user->user_nation = $request->user_nation;
        $user->save();
        Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');
      }
    }
    //kết thúc-----------cập nhật thông tin cơ bản----------

    //-----------cập nhật thông tin tài khoản ngân hàng----------
    else if(isset($request->update_account_bank)){
      //user_ownerbank, user_numbank, user_bankname, user_address_USDT, user_qrcode_image
      $this->validate($request, [
        'user_ownerbank' => ['min:3', 'max:255', 'regex:^[A-Za-z0-9]+$^'],
        'user_numbank' => ['max:255'],
        'user_bankname' => ['string', 'max:255'],
        'user_address_USDT' => [ 'string', 'max:1024'],
        'user_qrcode_image' => ['file', 'image']
      ],
      [
      ]);
      $get_image = $request->file('user_qrcode_image');
      if($get_image){
        //$get_name_image = $get_image->getClientOriginalName();
        //$name_image = current(explode('.', $get_name_image));

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_qrcode_image =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }

      $user->user_ownerbank = $request->user_ownerbank;
      $user->user_numbank = $request->user_numbank;
      $user->user_bankname = $request->user_bankname;
      $user->user_address_USDT = $request->user_address_USDT;
      $user->save();
      Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');
    }
    //kết thúc-----------cập nhật thông tin tài khoản ngân hàng----------

    //-----------cập nhật thông tin chứng minh nhân dân----------

    else if(isset($request->update_identity)){
      //user_name_identity, user_number_identity, user_identity_image, user_identity_image_a, user_identity_image_body
      if($request->user_number_identity != $user->user_number_identity){
        $this->validate($request, [
          'user_name_identity' => ['max:255', 'regex:^[A-Za-z0-9]+$^'],
          'user_number_identity' => ['max:20', 'unique:users,user_number_identity'],
          'user_identity_image' => ['file', 'image']
        ],
        [
        ]);
        $user->user_number_identity = $request->user_number_identity;
      }

      //ảnh mặt trước
      $get_image = $request->file('user_identity_image');

      //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
      if($get_image){
      

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_identity_image =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }

      //ảnh mặt sau CMT
      $get_image = $request->file('user_identity_image_a');

      //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
      if($get_image){
        

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_identity_image_a =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }
      //ảnh CMT và người
      $get_image = $request->file('user_identity_image_body');

      //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
      if($get_image){
        

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_identity_image_body =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }

      $user->user_name_identity = $request->user_name_identity;

      $user->save();
      Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');


    }
    //kết thúc-----------cập nhật thông tin chứng minh nhân dân----------
    //-----------cập nhật thông tin địa chỉ----------
    else if(isset($request->update_current_address)){

      //user_current_address, user_address_image


        $this->validate($request, [
          'user_current_address' => [ 'string', 'max:1024'],
          'user_address_image' => ['file', 'image']
        ],
        [
        ]);
         $get_image = $request->file('user_address_image');
        if($get_image){
          //$get_name_image = $get_image->getClientOriginalName();
          //$name_image = current(explode('.', $get_name_image));

          $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
          $user->user_address_image =$new_image;
          $get_image->move('public/uploads/image_user', $new_image);
        }
        $user->user_current_address = $request->user_current_address;
        $user->save();
        Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
          return Redirect::to('/userinfo');



    }
    //kết thúc-----------cập nhật thông tin địa chỉ----------
    //-----------cập nhật thông tin GPKD----------
    else if(isset($request->update_GPKD)){
      //user_name_GPKD, user_MST, user_GPKD_image
      $this->validate($request, [
        'user_name_GPKD' => ['max:255', 'regex:^[A-Za-z0-9]+$^'],
        'user_MST' => ['max:255'],
        'user_GPKD_image' => ['file', 'image']
      ],
      [
      ]);
      $get_image = $request->file('user_GPKD_image');

      //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
      if($get_image){
        //$get_name_image = $get_image->getClientOriginalName();
        //$name_image = current(explode('.', $get_name_image));

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_GPKD_image =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }
      $user->user_name_GPKD = $request->user_name_GPKD;
      $user->user_MST = $request->user_MST;
      $user->save();
      Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');


    }
    //kết thúc-----------cập nhật thông tin GPKD----------
    }

  }
  

  //hiển thị thông tin người dùng
  public function userInfo(){
    if(Auth::check()){

      return view('member.userinfo', ['user' => Auth::user()]);
    }
    else{
      return Redirect::to('/login');
    }
  }
//kết thúc------------cập nhật, hiển thị và xác minh thông tin người dùng -------------



// ----------------Xử lý đăng nhập, đăng ký, đăng xuất người dùng ------------
  //hiển thị trang đăng ký
  public function register(){
    if(Auth::check()){
      return Redirect::to('/');
    }
    else{
      return view('auth.register');
    }

  }
  public function login(){
    if(Auth::check()){
      return Redirect::to('/');
    }
    else{
      return view('auth.login');
    }

  }
  // đăng xuất người dùng
  public function logOut(){
    Auth::logout();
    return Redirect::to('login');
  }

  //xử lý đăng ký tài khoản
  public function checkUserRegister(Request $request){

    $query_pay = User::where('id', $request->user_introduction)->get()->toArray();
    // echo '<pre>';
    // print_r($query_pay);
    // echo '<pre>';
    // echo $request->user_itroduction;
    //kiểm tra mã giới thiệu
    if(count($query_pay) > 0){
      $this->validate($request, [
        'user_name' => 'required|min:3|max:255',
        'user_email' => 'required|email|max:255|unique:users,email',
        'user_username' => ['required', 'min:3', 'max:255', 'unique:users,name', 'regex:^[a-z0-9]+$^'],
        'user_password' => 'required|min:8|max:32',
        'user_password_pay' => ['required', 'min:6', 'max:32', 'regex:^[0-9]+$^'],
        'user_phone' => 'required|min:7|max:14|unique:users,user_phone',
        'user_introduction' => 'required',
        'user_nation' => 'required'
      ],
      [
        'user_name.required' => 'Bạn chưa nhập tên người dùng',
        'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
        'user_name.max' => 'Tên người dùng không quá 255 ký tự',
        'user_username.required' => 'Bạn chưa nhập tên đăng nhập tài khoản',
        'user_username.min' => 'Tên đăng nhập tài khoản phải có ít nhât 3 ký tự',
        'user_username.max' => 'Tên đăng nhập tài khoản không quá 32 ký tự',
        'user_username.unique' => 'username đã có người sử dụng',
        'user_email.required' => 'Bạn chưa nhập email',
        'user_email.max' => 'Email của bạn không đúng',
        'user_email.email' => 'Bạn chưa nhập đúng định dạng email',
        'user_email.unique' => 'Email này đã có người dùng',
        'user_password.required' => 'Bạn chưa nhập mật khẩu',
        'user_password.min' => 'Để tăng tính bảo mật vui lòng nhập mật khẩu tài khoản ít nhất 8 ký tự',
        'user_password.max' => 'Mật khẩu của bạn quá dài',
        'user_password_pay.required' => 'Bạn chưa nhập mật khẩu',
        'user_password_pay.min' => 'Để tăng tính bảo mật khi giao dịch vui lòng nhập mật khẩu thanh toán ít nhất 8 ký tự',
        'user_password_pay.max' => 'Mật khẩu của bạn quá dài',
        'user_password_pay.regex' => 'Mật khẩu thanh toán chỉ bao gồm số.',
        'user_phone.required' => 'Bạn chưa nhập số điện thoại',
        'user_phone.unique' => 'Số điện thoại đã có người dùng !',
        'user_phone.min' => 'Số điện thoại không đúng',
        'user_phone.max' => 'Số điện thoại không đúng',
        'user_introduction.required' => 'Bạn phải có mã giới thiệu',
        'user_nation.required' => 'hack web hả !'
      ]
    );
    if (preg_match('/[óòỏõọôốồổỗộơớờởỡợÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢ@áàảãạăắặằẳẵâấầẩẫậÁÀẢÃẠĂẮẶẰẲẴÂẤẦẨẪẬđĐéèẻẽẹêếềểễệÉÈẺẼẸÊẾỀỂỄỆíìỉĩịÍÌỈĨỊúùủũụưứừửữựÚÙỦŨỤƯỨỪỬỮỰýỳỷỹỵÝỲỶỸỴ\'^£$%&*()}{!#~"?><>,|=.+¬-]/', $request->user_username) || strpos($request->user_username, ' '))
        {
            Session::flash('message', 'Username Không hợp lệ !');
            return Redirect::to('/register');
        }

    else{
      $date = Carbon::now();
      $remember_token = $date->toDateString().$date->toTimeString().rand().rand();  
        //thêm vào bảng users
      $user = new User;
      $user->email = $request->user_email;
      $user->name = $request->user_username;
      $user->password = bcrypt($request->user_password);
      $user->user_password_pay = Hash::make($request->user_password_pay);
      $user->user_name = $request->user_name;
      $user->user_phone = $request->user_phone;
      $user->user_introduction = $request->user_introduction;
      $user->user_nation = $request->user_nation;

      $user->remember_token = $remember_token;
      $user->save();


      $get_new_user = User::where('name', '=', $request->user_username)->first();
      //Thêm vào bảng main_wallet
      $main_wallet = new WalletMain;

      $main_wallet->main_wallet_ofuser = $get_new_user->id;
      $main_wallet->save();

      //thêm vào bảng WalletEco
      $eco_wallet = new WalletEco;
      $eco_wallet->eco_wallet_ofuser = $get_new_user->id;
      $eco_wallet->save();

      //thêm vào bảng ext_wallet
      $ext_wallet = new WalletExt;
      $ext_wallet->ext_wallet_ofuser = $get_new_user->id;
      $ext_wallet->save();

      //thêm vào bảng ext_wallet
      $hm = new WalletLevel;
      $hm->hm_wallet_ofuser = $get_new_user->id;
      $hm->save();

      //thêm vào bảng ext_wallet
      $setting_transfer = new SettingTransferPoint;
      $setting_transfer->setting_ofuser = $get_new_user->id;
      $setting_transfer->save();


      Session::flash('message', 'Bạn đã đăng ký thành công. Mời bạn đăng nhập !');

      return Redirect('/login');
    }

    }
    else{
      Session::flash('message', 'Mã giới thiệu không đúng !');
      return Redirect('/register');
    }

  }

  //xử lý đăng nhập người dùng

  public function checkUserLogin(Request $request){
    $this->validate($request, [

        'user_username' => 'required',
        'user_password' => 'required'
      ],
      [
        'user_username.required' => 'Bạn chưa nhập tên đăng nhập tài khoản',

        'user_password.required' => 'Bạn chưa nhập mật khẩu',

      ]);
        $user_username = $request->user_username;
        $user_password = $request->user_password;
        if(Auth::attempt(['name' => $user_username, 'password' => $user_password]))
        {
          if(Auth::check()) {
            return Redirect::to('/');
          }
          else{
            return Redirect::to('/login');
          }


        }
        else{
            Session::flash('message', 'Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/login');
        }
  }
// kết thúc----------------Xử lý đăng nhập, đăng ký, đăng xuất người dùng ------------
}
