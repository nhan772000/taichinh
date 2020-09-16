<?php 
use App\SettingInfoNap;
use App\SettingRateCurrency;
?>
@extends('layouts.master')
@section('content')
<body>
<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h2 class="uppercase">Deposit</h2>

          </div>
          <div class="col-xs-12 text-left">
              
            
          </div>
        </div>
        <form action="{{url('form-Nap') }}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}

          <div class="form-group">
            <label for="nap">You want type?:</label>
            <select required id="chonloainap" class="form-control" name="currency">
              <option value="-1">--Select typer--</option>
              <option value="0">VND</option>
              <option value="1">USDT</option>
                  
            </select>
          </div>
            <!-- khi chọn VND hiện ra -->
            <div id="rate_currency">
                <div>
                  <span><b>POINT: </b><input value="1"/></span>
                  <span><i class="fa fa-exchange"></i></span>
                  <span><b>VND: </b><input id="rate_VND" value="{{ SettingRateCurrency::where('id', 1)->value('rate_currency')}}"/></span>
                  <span><i class="fa fa-exchange"></i></span>
                  <span><b>USDT: </b><input id="rate_USDT" value="{{ SettingRateCurrency::where('id', 2)->value('rate_currency')}}"/></span>

                </div>
            </div>
          <div class="form-group">
            <label for="point">Point:</label>
            <input required type="number" id="point_chuyen" class="form-control" name="point" placeholder="point" value="" >
           <!--  khi nhập điểm thì hiện ra -->
           <div id="deposit_info">
                <h3 class="notice_bank"></h3>
                <div class="for_VND">
                  <ul>
                  <li><b>Account name: </b>{{ SettingInfoNap::where('id', 1)->value('holder_name')}}</li>
                  <li><b>Bank name: </b>{{ SettingInfoNap::where('id', 1)->value('bank_name')}}</li>
                  <li><b>Bank account number: </b>{{ SettingInfoNap::where('id', 1)->value('card_number')}}</li>
                  </ul>
                </div>
                <div class="for_USD">
                  <div class="input-group form-group">
                    <input id="code_usdt" class="form-control" value="123SDFDSFK432KSD-SDFSDFSDF23423"/>
                    <div class="input-group-btn">
                      <button class="showhidepwdtt btn btn-default" type="button" onclick="coppy_clip()">
                        <i class="fa fa-copyright"></i>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
            <style>
              #deposit_info{
                display: none;
                border: 1px solid #009E4E;
                 border-radius: 5px;
                 padding: 5px;
                 text-align: left;
                 margin: 10px 0px;
              }
              #code_usdt{
                width: 100%;
              }
              #rate_currency{
                 border: 1px solid #009E4E;
                 border-radius: 5px;
                 padding: 5px;
                 text-align: center;
              }
              #rate_currency input{
                width: 75px;
              }
              .for_VND{
                display: none;
              }
              .for_USD{
                display: none;
              }
            </style>
            <script>
              function toggle_pass() {
                var x = document.getElementById("pwdtt");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
              function coppy_clip() {
                /* Get the text field */
                var copyText = document.getElementById("code_usdt");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
              }
              $(document).ready(function(){

                $("#chonloainap").change(function(){
                  if($("#chonloainap").val() == 0){
                    if($("#point_chuyen").val() != null){
                      $(".notice_bank").html("Bạn cần chuyển "+$('#rate_VND').val()* $("#point_chuyen").val() + " VNĐ vào tài khoản sau:");
                    }
                    $("#deposit_info").css("display", "block");
                    $(".for_VND").css("display", "block");
                    $(".for_USD").css("display", "none");

                  }else{
                    if($("#point_chuyen").val() != null){
                      $(".notice_bank").html("Bạn cần chuyển "+$('#rate_USDT').val()* $("#point_chuyen").val() + " USDT vào tài khoản sau:");
                    }
                    $("#deposit_info").css("display", "block");
                    $(".for_VND").css("display", "none");
                    $(".for_USD").css("display", "block");
                  }
                });
                $("#point_chuyen").change(function(){
                  if($("#chonloainap").val() == -1){
                    $(".notice_bank").html("You must select type currency");
                    $("#deposit_info").css("display", "block");
                  }else if($("#chonloainap").val() == 0){
                    $(".notice_bank").html("Bạn cần chuyển "+$('#rate_VND').val()* $("#point_chuyen").val() + " VNĐ vào tài khoản sau:");
                    $("#deposit_info").css("display", "block");
                  }else{
                    $("#deposit_info").css("display", "block");
                    $(".notice_bank").html("Bạn cần chuyển "+$('#rate_USDT').val()* $("#point_chuyen").val() + " USDT vào tài khoản sau:");
                  }
                });
              });
            </script>
          </div>
          <div class="form-group">
            <label for="picture">Phiếu CK:</label>
            <input required type="file" class="form-control" name="picture">
            <label for="picture">Phiếu CK 2 (Not require)</label>
            <input type="file" class="form-control" name="picture2">
          </div>
          <label for="pwdtt">Account password:</label>
          <div class="input-group form-group">
            <input required type="password" class="form-control" id="pwdtt" name="pwdtt" placeholder="Account password">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button" onclick="toggle_pass()">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Note:">
          </div>
          
          <button type="submit" class="btn btn-success btn-block" name="Pay">Nạp</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
@endsection
