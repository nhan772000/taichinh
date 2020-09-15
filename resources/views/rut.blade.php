<?php
use App\User;
$id = Auth::user()->id;
$user = User::where('id', $id)->first();
$email_otp = $user->email_verified;
?>
@extends('layouts.master')
@section('content')
<body>

<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well well-sm">
        <h2 class="text-center uppercase">withdraw</h2>
        <form action="{{url('form-Rut')}}" method="post" id="form-rut">
          {!! csrf_field() !!}

          <p class="alert alert-warning">You can withdraw up to 1000 points</p>
          <div class="form-group">
            <label for="sodiem">You want withdraw:</label>
            <input required type="number" class="form-control" id="sodiem" placeholder="point" name="point" min="100" max="1000">
          </div>
          <div class="form-group">
            <label for="currency">Which currency do you want to withdraw:</label>
            <select required id="chonloairut" class="form-control" id="currency" name="currency">
                <option  value="-1">--select type--</option>
                <option value="0">VND</option>
                <option value="1">USDT</option>
                  
            </select>
          </div>
          <div id="show_info_rut" class="form-group alert alert-warning">
                <div id="for_VND" class="form-group">
                    <h3>Your Info</h3>
                        <p><b>Bank's name: </b>{{ $user->user_bankname}}</p>
                        <p><b>Owner name: </b>{{ $user->user_ownerbank}}</p>
                        <p><b>Account number: </b>{{ $user->user_numbank}}</p>

                </div>
                <div id="for_USD" class="form-group">
                    <h3>Your Address</h3>
                    <input class="form-control" readonly value="{{ $user->user_address_USDT}}"/>
                </div>
           
          </div>
          <style>
              #show_info_rut{
                  display: none;
              }
              .enter_otp{
                display: none;
              }
          </style>
          <script>
             $(document).ready(function(){
                $("#chonloairut").change(function(){
                    if($('#chonloairut').val() == -1){
                        $('#notice').css('display', 'block');
                        $('#show_info_rut').css('display', 'none');
                    }else if($('#chonloairut').val() == 0){
                        $('#show_info_rut').css('display', 'block');
                        $('#for_VND').css('display', 'block');
                        $('#for_USD').css('display', 'none');

                        
                    }else if($('#chonloairut').val() == 1){
                        $('#show_info_rut').css('display', 'block');
                        $('#for_VND').css('display', 'none');
                        $('#for_USD').css('display', 'block');
                    }
                    
                });
                                 
             });
            function toggle_pass() {
                var x = document.getElementById("pwdtt");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
          </script>
           <div class="form-group">
            <label for="description">Note:</label>
            <input type="text" class="form-control" name="description" placeholder="Note??">
          </div>
          
          <label for="pwdtt">Account password:</label>
          <div class="input-group form-group">
            <input required type="password" class="form-control" id="pwdtt" placeholder="Account password" name="pwdtt">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button" onclick="toggle_pass()">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
        </div>
        <div class="enter_otp">
          <label for="otp">OTP:</label>
          <div class="form-group">
            <div class="input-group form-group">
              <input type="number" class="form-control" id="otp" placeholder="OTP" name="otp">
              <div class="input-group-btn">
              <button class="otp-btn btn btn-default" id="resendotp" type="button" onclick="sendOTP(this.id, '<?php echo $email_otp;?>')">
                <i class="glyphicon glyphicon-repeat"></i>
              </button>
            </div>
            </div>
            <div>
            <p id="notice-opt"></p>
            </div>
          </div>
        </div>
        
          <button id="hinddenBtn" style="display: none;" type="submit"></button>
        <button onclick="sendOTP(this.id, '<?php echo $email_otp;?>')" type="button" id="submit" class="btn btn-success btn-block" name="rut">Rút</button>
        </form>
        <script type="text/javascript">
          
          function sendOTP(id, email){
            
            $('.enter_otp').css('display', 'block');
            if(id== "submit"){
              if($('#otp').val() == ""){
                $.ajax({
                  url:'http://web13.mevivu.com/taichinh/sendOTP/' + email,
                  type:'get',
                  data: {email: email},
                  success: function(response){
                    sessionStorage.setItem("otp", response.otp);
                    $("#notice-opt").html("OPT was send to your email!");
                  }
                });
              }else if(sessionStorage.getItem("otp") == $('#otp').val()){
                sessionStorage.setItem("otp", Math.floor(Math.random() * 100000));
                $('#hinddenBtn').trigger("click");
             }else{
              $("#notice-opt").html("Wrong OTP!");

             }
            }else if(id == "resendotp"){
              $.ajax({
                  url:'http://web13.mevivu.com/taichinh/sendOTP/' + email,
                  type:'get',
                  data: {email: email},
                  success: function(response){
                    sessionStorage.setItem("otp", response.otp);
                    $("#notice-opt").html("OPT was resend to your email!");
                    
                  }
                });
            }
             
         
          }
          
          </script>
      </div>
    </div>
  </div>
</div>

@endsection