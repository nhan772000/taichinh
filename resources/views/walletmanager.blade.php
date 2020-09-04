@extends('layouts.master')
@section('content')
<body>

<div class="container mevivu_vi body">
  <div class="row">
    <div class="row margin_row mevivu_home_sesion1">
      <div class="col-xs-4">
        <a href="{!!url('/wallet/walletdetail/0')!!}" class="btn btn-success1 button_home">
          <i class="icon_size glyphicon glyphicon-home"></i> <span>Main Wallet</span>
          <span class="amount">{{ $arr_wallet_amount['main_wallet_amount'] }} Point</span>
        </a>
      </div>
      <div class="col-xs-4">
        <a href="{!!url('/wallet/walletdetail/1')!!}" class="btn btn-success1 button_home">
          <i  class="icon_size glyphicon glyphicon-piggy-bank"></i><span>Ext Wallet</span>
          <span class="amount">{{ $arr_wallet_amount['ext_wallet_amount'] }} Point</span>
        </a>
      </div>
      <div class="col-xs-4">
        <a href="{!!url('/wallet/walletdetail/2')!!}" class="btn btn-success1 button_home">
          <i  class="icon_size glyphicon glyphicon-piggy-bank"></i><span>Eco Wallet</span>
          <span class="amount">{{ $arr_wallet_amount['eco_wallet_amount'] }} Point</span>
        </a>
      </div>
     
  </div>
	<div class="mevivu_home_sesion3 row">
                <div class="col-xs-4 text-center">
                    <a href="{!!url('/nap')!!}" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-save"></i> Nạp</a>
                </div>
                <div class="col-xs-4  text-center">
                    <a href="{!!url('/rut')!!}" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-open"></i> Rút</a>
                </div>
                <div class="col-xs-4  text-center">
                    <a href="tangHM.html" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-list-alt"></i> Inc HM</a>
                </div>
      
      </div>
      <div class="mevivu_home_sesion3 row">
        <div class="col-xs-4  text-center" >
                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-list-alt"></i> Story In</button>
                </div>
                <div class="col-xs-4  text-center" >
                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-list-alt"></i> Story Out</button>
                </div>
                <div class="col-xs-4 text-center">
                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-list-alt"></i> Story HM</button>
                </div>
      </div>



<a href="home.html">comback home</a>



    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection