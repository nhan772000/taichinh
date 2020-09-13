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
            <h2>Payment</h2>

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
            <div id="select_VND_or_USDT">
              
            </div>
          <div class="form-group">
            <label for="point">Point:</label>
            <input required type="number" id="point_chuyen" class="form-control" name="point" placeholder="point" value="0" >
           <!--  khi nhập điểm thì hiện ra -->
           <div id="deposit_info">
                <p class="notice_bank"></p>
                <div class="for_VND">
                  <ul>
                  <li><b>Account name: </b>{{ SettingInfoNap::where('id', 1)->value('holder_name')}}</li>
                  <li><b>Bank name: </b>{{ SettingInfoNap::where('id', 1)->value('bank_name')}}</li>
                  <li><b>Bank account number: </b>{{ SettingInfoNap::where('id', 1)->value('card_number')}}</li>
                  </ul>
                </div>
                <div class="for_USD">
                  <input placeholder="ÚDSDSDSD"/>
                </div>
            </div>
            <style>
              .for_VND{
                display: none;
              }
              .for_USD{
                display: none;
              }
            </style>
            <script>
              $(document).ready(function(){

                $("#chonloainap").change(function(){
                  if($("#chonloainap").val() == 0){
                    if($("#point_chuyen").val() != 0){
                      $(".notice_bank").html("Bạn cần nạp VND");
                    }
                    $(".for_VND").css("display", "block");
                  }else{
                    if($("#point_chuyen").val() != 0){
                      $(".notice_bank").html("Bạn cần nạp VND");
                    }
                    $(".for_USDT").css("display", "block");
                  }
                });
                $("#point_chuyen").change(function(){
                  if($("#chonloainap").val() == -1){
                    $(".notice_bank").html("You must select type currency");
                  }else if($("#chonloainap").val() == 0){
                    $(".notice_bank").html("VND");
                  }else{
                    $(".notice_bank").css("USD");
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
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <div class="form-group">
            <label for="description">Ghi chú:</label>
            <input type="text" class="form-control" name="description" placeholder="Ghi chú gì đó??">
          </div>
          
          <button type="submit" class="btn btn-success btn-block" name="Pay">Nạp</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
@endsection
