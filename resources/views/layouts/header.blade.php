<?php
    $user = Auth::user();
     $listNotice = DB::table('notice')->where('notice_fromuser', $user->id)->orWhere('notice_touser', $user->id)->orderBy('id','desc')->take(10)->get();
     $countUnreadNotice = DB::table('notice')->where(['notice_fromuser'=> $user->id, 'notice_read_status'=> 0])->get();
    use App\WalletLevel;
    use App\User;
    $id = auth()->user()->id;
    $hm = WalletLevel::where('hm_wallet_ofuser', $id)->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1 /> -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token()}}" />

  <title>Document</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/1.2.1/html5-qrcode.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{!!url('public/css/mevivu.min.css')!!}">
  
  <link rel="stylesheet" href="{!!url('public/css/style.css')!!}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

</head>



<header id="header_main" class="container">

     
    
        
      <div class="row">
   
    <div class="col-xs-4 col-sm-2">
        <a href="{{URL::to('/')}}"><img src="public/images/logomevivumoi.png" width="100%" alt="" style="padding-top: 7px;"></a>
    </div>
    <div class="thongbao col-xs-4 col-sm-2">
      <a id="clear_thongbao" class="icon_thongbao hidden-xs"><span class="glyphicon glyphicon-bell"></span><span id="thongbao" style="margin-top: -20px; padding: 1px 4px; background: red;" class="badge"><?php echo count($countUnreadNotice);?></span></a>
      <style>
        ul.menu_thongbao{
            padding: 10px;
            border: 2px solid #ccc;
            list-style: none;
            background: #fff !important;
        }
        ul.menu_thongbao li:hover{
            background: #4cd24c;
                        color: #fff !important;

        }

        ul.menu_thongbao li{
        padding: 5px;
            color: #000 !important;
            font-weight: 400;
        }
        .view-notice a{
        color: red !important;
        }
        .alert-readed{
             background: #ccc !important;
            color: #000 !important;
        }
        .menu_thongbao li{
            border-bottom: 2px solid #fff;
        }
      </style>
      <ul class="menu_thongbao">
         @foreach($listNotice as $notice)
                    @if($notice->notice_typeorder == 0)
                        <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã rút {{$notice->notice_point}}</li>
                    @elseif($notice->notice_typeorder == 1)
                        @if($notice->notice_typewallet == 0)
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã nạp {{$notice->notice_point}} vào ví chính</li>
                        @else
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger  hnot{{$notice->id}} <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã nạp {{$notice->notice_point}} vào ví phụ</li>
                        @endif
                    @elseif($notice->notice_typeorder == 2)
                        @if($id == $notice->notice_fromuser)
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã nhận {{$notice->notice_point}} từ {{$notice->notice_fromuser}} </li>
                        @else
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã chuyển {{$notice->notice_point}} đến {{$notice->notice_touser}} </li>
                        @endif

                    @elseif($notice->notice_typeorder == 3)
                        <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã nhận cashback {{$notice->notice_point}} từ {{$notice->notice_fromuser}}</li>
                    @elseif($notice->notice_typeorder == 4)
                        @if(0 == $notice->notice_typewallet)
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã bị trừ {{$notice->notice_point}} tài khoản chính vì transfer special</li>
                        @else
                            <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã được cộng {{$notice->notice_point}} tài khoản tiết kiệm vì transfer special</li>
                        @endif
                    @elseif($notice->notice_typeorder == 5)
                        <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã cộng {{$notice->notice_point}} vào ví hạn mức nhờ phát triển thị trường</li>
                    @elseif($notice->notice_typeorder == 6)
                        <li id="{{$notice->id}}" onclick="readhead(this.id)"  class="alert-danger hnot{{$notice->id}} <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>"><i class="material-icons">info_outline</i> Bạn đã nhận MLM {{$notice->notice_point}} từ {{$notice->notice_fromuser}}</li>
                    @endif
                @endforeach
                <li class="text-center view-notice"><a href="{{URL::to('/notice')}}"> View all</a></li>
      </ul>
    </div>

    
    <div class="vihanmuc col-xs-5 col-sm-5 text-left">
      <span class="icon_size amount">
        {{$hm->hm_wallet_point}}
      </span>
    </div>
    <div class="col-xs-3 col-sm-2 ngonngu">
        <a href="#" class="icon_language">Language</a>

            <ul class="language_desktop">
                    <li><a href="#">English</a></li>
                      <li><a href="#">Vietnamese</a></li>
                      <li><a href="deal_story.html">Chinese</a></li>
                      
                    </ul>

    </div>


    <div class="menu col-xs-1 text-center hidden-xs">
      <i class="glyphicon glyphicon-align-justify icon_menu"></i>
      <ul class="menu-right">
                      <li><a href="{{URL::to('/userinfo')}}">Information</a></li>
                      <li><a href="deal_story.html">Story</a></li>
                      <li><a href="#">Develop</a></li>
                      <li><a href="{{URL::to('/setting')}}">Setting</a></li>
                      <li><a href="#">Change password</a></li>
                      <li><a href="#">Tutorial video</a></li>
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                    </ul>
    </div>
  </div>
    <script>
            function readhead(id) {
                 $.ajax({
                  url:'<?php echo url()->current(); ?>/notice/readNotice/' + id,
                  type:'get',
                  data: {id: id},
                  success: function(result){
                      
                    $(".hnot"+id).css('background', '#ccc');
                    $(".hnot"+id).css('color', '#000');
                    
                  }
                });
            }

            
        </script>
</header>