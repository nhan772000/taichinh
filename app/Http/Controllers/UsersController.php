<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Mail;
use App\User;
use App\Eco_wallet;
use App\Main_wallet;
use App\Ext_wallet;
use Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
session_start();

class UsersController extends Controller
{
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
      //user_ownerbank, user_numbank, user_bankname, address_USDT
      $this->validate($request, [
        'user_ownerbank' => ['min:3', 'max:255', 'regex:^[A-Za-z0-9]+$^'],
        'user_numbank' => ['max:255'],
        'user_bankname' => ['string', 'max:255'],
        'address_USDT' => [ 'string', 'max:1024']
      ],
      [
      ]);
      $user->user_ownerbank = $request->user_ownerbank;
      $user->user_numbank = $request->user_numbank;
      $user->user_bankname = $request->user_bankname;
      $user->address_USDT = $request->address_USDT;
      $user->save();
      Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
        return Redirect::to('/userinfo');
    }
    //kết thúc-----------cập nhật thông tin tài khoản ngân hàng----------

    //-----------cập nhật thông tin chứng minh nhân dân----------

    else if(isset($request->update_identity)){
      //user_name_identity, user_number_identity, user_identity_image
        $this->validate($request, [
        'user_name_identity' => ['max:255', 'regex:^[A-Za-z0-9]+$^'],
        'user_number_identity' => ['max:20', 'unique:users,user_number_identity'],
        'user_identity_image' => ['file', 'image']
      ],
      [
      ]);
      $get_image = $request->file('user_identity_image');

      //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
      if($get_image){
        //$get_name_image = $get_image->getClientOriginalName();
        //$name_image = current(explode('.', $get_name_image));

        $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
        $user->user_identity_image =$new_image;
        $get_image->move('public/uploads/image_user', $new_image);
      }
      $user->user_name_identity = $request->user_name_identity;
      $user->user_number_identity = $request->user_number_identity;
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
  // public function updateUserInfo(Request $request){
  //   //kiểm tra nếu đăng nhập admin thì mới được thực hiện
  //   if(Auth::check()){
  //     $user_auth = Auth::user();
  //     $user = User::find($user_auth->id);
      

  //     //nếu là người dùng loại 0, nghĩa là chưa xác minh
  //     if($user_auth->user_type == 0){
  //       $get_image = $request->file('user_identity_img');

  //       //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
  //       if($get_image){
  //         //$get_name_image = $get_image->getClientOriginalName();
  //         //$name_image = current(explode('.', $get_name_image));

  //         $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
  //         $user->user_identity_image =$new_image;
  //         $get_image->move('public/uploads/image_user', $new_image);
  //       }
  //       if ($user_auth->email != $request->user_email && $user_auth->user_phone != $request->user_phone) {
         
  //         $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
  //           'user_email' => 'required|email|max:255|unique:users,email',
  //           'user_phone' => 'required|min:7|max:14|unique:users,user_phone',
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
  //           'user_email.required' => 'Bạn chưa nhập email',
  //           'user_email.max' => 'Email của bạn không đúng',
  //           'user_email.email' => 'Bạn chưa nhập đúng định dạng email',
  //           'user_email.unique' => 'Email này đã có người dùng',
  //           'user_phone.required' => 'Bạn chưa nhập số điện thoại',
  //           'user_phone.unique' => 'Số điện thoại đã có người dùng !',
  //           'user_phone.min' => 'Số điện thoại không đúng',
  //           'user_phone.max' => 'Số điện thoại không đúng',
  //         ]);
  //         $user->user_name = $request->user_name;
  //         $user->email = $request->user_email;
  //         $user->user_phone = $request->user_phone;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //       // kiểm tra khi email thay đổi
  //       elseif($user_auth->email != $request->user_email && $user_auth->user_phone == $request->user_phone){
  //         $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
  //           'user_email' => 'required|email|max:255|unique:users,email',
            
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
  //           'user_email.required' => 'Bạn chưa nhập email',
  //           'user_email.max' => 'Email của bạn không đúng',
  //           'user_email.email' => 'Bạn chưa nhập đúng định dạng email',
  //           'user_email.unique' => 'Email này đã có người dùng',
  //         ]);
  //         $user->user_name = $request->user_name;
  //         $user->email = $request->user_email;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //       //kiểm tra khi số điện thoại thay đổi
  //       elseif($user_auth->email == $request->user_email && $user_auth->user_phone != $request->user_phone){
  //         $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
  //           'user_phone' => 'required|min:7|max:14|unique:users,user_phone',
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
  //           'user_phone.required' => 'Bạn chưa nhập số điện thoại',
  //           'user_phone.unique' => 'Số điện thoại đã có người dùng !',
  //           'user_phone.min' => 'Số điện thoại không đúng',
  //           'user_phone.max' => 'Số điện thoại không đúng',
  //         ]);
  //         $user->user_name = $request->user_name;
  //         $user->user_phone = $request->user_phone;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //       else{
  //         $user->user_name = $request->user_name;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //     }
  //     //người dùng đã xác mình email
  //     elseif ($user_auth->user_type == 1) {
  //       $get_image = $request->file('user_identity_img');

  //       //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
  //       if($get_image){
  //         //$get_name_image = $get_image->getClientOriginalName();
  //         //$name_image = current(explode('.', $get_name_image));

  //         $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
  //         $user->user_identity_image =$new_image;
  //         $get_image->move('public/uploads/image_user', $new_image);
  //       }
  //       //kiểm tra khi số điện thoại thay đổi
  //       if($user_auth->user_phone != $request->user_phone){
  //         $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
  //           'user_phone' => 'required|min:7|max:14|unique:users,user_phone',
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
  //           'user_phone.required' => 'Bạn chưa nhập số điện thoại',
  //           'user_phone.unique' => 'Số điện thoại đã có người dùng !',
  //           'user_phone.min' => 'Số điện thoại không đúng',
  //           'user_phone.max' => 'Số điện thoại không đúng',
  //         ]);
  //         $user->user_name = $request->user_name;
  //         $user->user_phone = $request->user_phone;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //       else{
  //         $user->user_name = $request->user_name;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //       }
  //     }
  //     //đã xác minh số điện thoại
  //     elseif ($user_auth->user_type == 2) {
  //       $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
            
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
            
  //         ]);
  //       $get_image = $request->file('user_identity_img');

  //       //kiểm tra và xử lý hình ảnh chứng minh thư khi úp lên
  //       if($get_image){
  //         //$get_name_image = $get_image->getClientOriginalName();
  //         //$name_image = current(explode('.', $get_name_image));

  //         $new_image = $user_auth->id.rand().'.'.$get_image->getClientOriginalExtension();
  //         $user->user_identity_image =$new_image;
  //         $get_image->move('public/uploads/image_user', $new_image);
  //       }
  //         $user->user_name = $request->user_name;
  //         $user->user_ownerbank = $request->user_ownerbank;
  //         $user->user_numbank = $request->user_numbank;
  //         $user->user_bankname = $request->user_bankname;
  //         $user->address_USDT = $request->address_USDT;
  //         $user->save();
  //         Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //         return Redirect::to('/userinfo');
  //     }
  //     elseif ($user_auth->user_type == 3) {
  //       $this->validate($request, [
  //           'user_name' => 'required|min:3|max:255',
            
  //         ],
  //         [
  //           'user_name.required' => 'Bạn chưa nhập tên người dùng',
  //           'user_name.min' => 'Tên người dùng phải có ít nhât 3 ký tự',
  //           'user_name.max' => 'Tên người dùng không quá 255 ký tự',
  //           'user_phone.required' => 'Bạn chưa nhập số điện thoại',
  //           'user_phone.unique' => 'Số điện thoại đã có người dùng !',
  //           'user_phone.min' => 'Số điện thoại không đúng',
  //           'user_phone.max' => 'Số điện thoại không đúng',
  //         ]);
  //       $user->user_name = $request->user_name;
  //       $user->user_ownerbank = $request->user_ownerbank;
  //       $user->user_numbank = $request->user_numbank;
  //       $user->user_bankname = $request->user_bankname;
  //       $user->address_USDT = $request->address_USDT;
  //       $user->save();
  //       Session::flash('message', 'Bạn đã cập nhật thông tin thành công !');
  //       return Redirect::to('/userinfo');
  //     }
      
  //   }
  //   else{
  //     Session::flash('message', 'Mời bạn đăng nhập !');
  //     return Redirect::to('/login');
  //   }
  // }

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
        'user_password_pay' => 'required|min:8|max:32',
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
        'user_phone.required' => 'Bạn chưa nhập số điện thoại',
        'user_phone.unique' => 'Số điện thoại đã có người dùng !',
        'user_phone.min' => 'Số điện thoại không đúng',
        'user_phone.max' => 'Số điện thoại không đúng',
        'user_introduction.required' => 'Bạn phải có mã giới thiệu',
        'user_nation.required' => 'hack web hả !'
      ]
    );

      $date = Carbon::now();
     $remember_token = $date->toDateString().$date->toTimeString().rand().rand();  
      //thêm vào bảng users
    $user = new User;
    $user->email = $request->user_email;
    $user->name = $request->user_username;
    $user->password = bcrypt($request->user_password);
    $user->user_password_pay = md5($request->user_password_pay);
    $user->user_name = $request->user_name;
    $user->user_phone = $request->user_phone;
    $user->user_introduction = $request->user_introduction;
    $user->user_nation = $request->user_nation;

    $user->remember_token = $remember_token;
    $user->save();


    $get_new_user = User::where('name', '=', $request->user_username)->first();
    //Thêm vào bảng main_wallet
    $main_wallet = new Main_wallet;

    $main_wallet->user_id = $get_new_user->id;
    $main_wallet->save();

    //thêm vào bảng eco_wallet
    $eco_wallet = new Eco_wallet;
    $eco_wallet->user_id = $get_new_user->id;
    $eco_wallet->save();

    //thêm vào bảng ext_wallet
    $ext_wallet = new Ext_wallet;
    $ext_wallet->user_id = $get_new_user->id;
    $ext_wallet->save();
    
    Session::flash('message', 'Bạn đã đăng ký thành công. Mời bạn đăng nhập !');

    return Redirect('/login');
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
