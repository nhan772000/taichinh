<?php 
use App\SettingInfoNap;
use App\User;
use App\SettingRateCurrency;
$list_bank =SettingInfoNap::where('type_currency', 0)->get();
$USDT =SettingInfoNap::where('type_currency', 1)->first();
$username = Auth::user()->user_name;

?>
@extends('layouts.master')
@section('content')
<body>
<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h2 class="uppercase">Deposit</h2>

          </div>
          <div class="col-xs-12 text-left">
          <input style="display: none" id="user_name" value="{{$username}}"/>
            
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
                  <span><b>POINT: </b><input readonly value="1"/></span>
                  <span><i class="fa fa-exchange"></i></span>
                  <span><b>VND: </b><input readonly id="rate_VND" value="{{ SettingRateCurrency::where('id', 1)->value('rate_currency')}}"/></span>
                  <span><i class="fa fa-exchange"></i></span>
                  <span><b>USDT: </b><input readonly id="rate_USDT" value="{{ SettingRateCurrency::where('id', 2)->value('rate_currency')}}"/></span>

                </div>
            </div>
          <div class="form-group">
            <label for="point">Point:</label>
            <input required type="number" id="point_chuyen" class="form-control"  min="100  " name="point" placeholder="point" value="" >
           <!--  khi nhập điểm thì hiện ra -->
           <div id="deposit_info">
                <h3 class="notice_bank"></h3>
                <div class="for_VND">
                  <select name="bank" id="searchbank" class="form-control">
                    @foreach ($list_bank as $row)
                    <option selected value="{{$row->code_bank}}">{{$row->bank_name}}</option>    
                    @endforeach
                  </select>

                  <table id="list-bank" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>  
                        <th><b>Code</b></th>
                        <th><b>Account name </b></th>
                        <th><b>Bank name </b></th>
                        <th><b>Bank account number </b></th>
                    </thead>
                    <tbody>
                      @foreach ($list_bank as $row)
                      <tr>
                        <td>{{ SettingInfoNap::where('code_bank', $row->code_bank)->value('code_bank')}}</td>
                        <td>{{ SettingInfoNap::where('code_bank', $row->code_bank)->value('holder_name')}}</td>
                        <td>{{ SettingInfoNap::where('code_bank', $row->code_bank)->value('bank_name')}}</td>
                        <td>{{ SettingInfoNap::where('code_bank', $row->code_bank)->value('card_number')}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="with-des">
                    <p></p>
                  </div>
                  <script>
                    $(document).ready(function(){
                      var value = $('#searchbank').val().toLowerCase();
                        $("#list-bank tbody tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      $("#searchbank").on("change", function() {
                        var value = $(this).val().toLowerCase();
                        $("#list-bank tbody tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script>
                </div>
                <div class="for_USD">
                  <h3 id="name_wallet_usdt" class="text-center uppercase">{{$USDT->bank_name}}</h3>
                  <div class="input-group form-group">
                    <input id="code_usdt" class="form-control" value="{{$USDT->card_number}}"/>
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
                var today = new Date();
                var time = today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear();
                $("#chonloainap").change(function(){
                if($("#chonloainap").val() == -1){                    $(".notice_bank").html("You must select type currency");
                    $("#deposit_info").css("display", "block");
                    $(".for_VND").css("display", "none");
                    $(".for_USD").css("display", "none");

                  }else if($("#chonloainap").val() == 0){
                    if($("#point_chuyen").val() != null){
                      $(".notice_bank").html("Bạn cần chuyển "+$('#rate_VND').val()* $("#point_chuyen").val() + " VNĐ vào tài khoản sau:");
                    }
                    $(".with-des p").html("Với nội dung: " + $('#user_name').val() +" nạp "+ $("#point_chuyen").val()*$('#rate_VND').val() + " VNĐ ngày: " + time +". Bạn vui lòng up biên lai lên và xác nhận. " )
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
                    $(".with-des p").html("Với nội dung: " + $('#user_name').val() +" nạp "+ $("#point_chuyen").val()*$('#rate_VND').val() + " VNĐ ngày: " + time +". Bạn vui lòng up biên lai lên và xác nhận. " )
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
            <label for="picture">Bill detail:</label>
            <input required type="file" class="form-control" name="picture">
            <label for="picture">Bill detail 2 (Not require)</label>
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
