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

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{!!url('public/css/mevivu.min.css')!!}">
  
  <link rel="stylesheet" href="{!!url('public/css/style.css')!!}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

</head>



<header id="header_main" class="container">

      <div class="hidden-sm hidden-lg">
      
      <form action="" style="width: 30%; margin-left: 70%;">
        <select name="language_mobile" class="form-control" style="height: 22px; padding: 0px">
          <option value=""><span class="glyphicon glyphicon-globe"></span> Language</option>
          <option value=""><span class="glyphicon glyphicon-globe"></span> English</option>
          <option value=""><span class="glyphicon glyphicon-globe"></span> French</option>
          
        </select>
        </form>
      
      </div>
    
        
      <div class="row">
   
    <div class="col-xs-2 col-sm-2">
        <a href="{!!url('/')!!}">Home</a>
    </div>
    <div class="col-sm-3 ngonngu hidden-xs">
        <a href="#" class="icon_language"><span class="glyphicon glyphicon-globe"></span> English</a>

            <ul class="language_desktop">
                      <li><a href="#">Spanish</a></li>
                      <li><a href="deal_story.html">French</a></li>
                      
                    </ul>

    </div>
    <div class="vihanmuc col-xs-5 col-sm-4 text-left">
      <a href="{!!url('/wallet/walletdetail/1')!!}"><span class="glyphicon glyphicon-oil"></span> Wallet level</a>
    </div>
    <div class="thongbao col-xs-2">
      <a id="clear_thongbao" class="icon_thongbao" href="#"><span class="glyphicon glyphicon-bell"></span><span id="thongbao" style="margin-top: -20px; padding: 1px 4px; background: red;" class="badge">5</span></a>
      <ul class="menu_thongbao">
        <li><a href="#">Bạn có cơ hội trúng iphone 12</a></li>
        <li><a href="deal_story.html">bạn vừa nhận 500 point từ Allen</a></li>
      </ul>
    </div>
    <div class="menu col-xs-1 text-center">
      <i class="glyphicon glyphicon-align-justify icon_menu"></i>
      <ul class="menu-right">
                      <li><a href="#">Information</a></li>
                      <li><a href="deal_story.html">Story</a></li>
                      <li><a href="#">Develop</a></li>
                      <li><a href="#">Setting</a></li>
                      <li><a href="#">Change password</a></li>
                      <li><a href="#">Tutorial video</a></li>
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="login.html">Logout</a></li>
                    </ul>
    </div>
  </div>
    
</header>