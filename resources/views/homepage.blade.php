@extends('layouts.master')
@section('content')
	<body>
	<div class="container body">
	        <div class="row margin_row">
	            <div class="col-sm-12">
	                <button class="btn btn-success "><i class=" glyphicon glyphicon-refresh"></i> transfer</button>
	            </div>
	        </div>
	    
	    
	    <div class="row margin_row mevivu_home_sesion1">
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/0')!!}" class="btn btn-success1 button_home">
				<i class="icon_size glyphicon glyphicon-home"></i> <span>M Wallet</span>
			</a>
	      </div>
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/1')!!}" class="btn btn-success1 button_home">
				<i  class="icon_size glyphicon glyphicon-piggy-bank"></i><span>Ext Wallet</span>
			</a>
	      </div>
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/2')!!}" class="btn btn-success1 button_home">
				<i  class="icon_size glyphicon glyphicon-credit-card"></i><span>Eco Wallet</span>
			</a>
	      </div>
	    </div>


	    <div class="mevivu_home_sesion2 row margin_row">
	      <div class="col-xs-offset-3 col-xs-3">
	        <div class="panel panel-default">
	          <div class="panel-heading text-center">Scaner QR</div>
	          <div class="panel-body">
	          <img src="public/images/1594702586.png" class="img-thumbnail" alt="Cinque Terre" width="100%"> 
	          </div>
	        </div>
	                
	      </div>
	      <div class=" col-xs-3">
	        <div class="panel panel-default">
	          <div class="panel-heading text-center">Scaner QR</div>
	          <div class="panel-body">
	          <img src="public/images/1594702586.png" class="img-thumbnail" alt="Cinque Terre" width="100%"> 
	          </div>
	        </div>
	                
	      </div>
	        </div>

	            <div class="mevivu_home_sesion3 row">
	                <div class="col-xs-4 text-center">
	                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-flag"></i> Introduce</button>
	                </div>
	                <div class="col-xs-4  text-center">
	                    <a href="accounting.html" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-bitcoin"></i> Account</a>
	                </div>
	                <div class="col-xs-4  text-center">
	                    <a href="wallet.html" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-list-alt"></i> Wallet</a>
	                </div>
	      
				</div>

				<div class="mevivu_home_sesion3 row">
					<div class="col-xs-4  text-center" >
	                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-ok-circle"></i> Online</button>
	                </div>
	                <div class="col-xs-4  text-center" >
	                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-ban-circle"></i> Offline</button>
	                </div>
	                <div class="col-xs-4 text-center">
	                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success button_home"><i class="icon_size glyphicon glyphicon-send"></i> View more</button>
	                </div>
				</div>





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

	</body>
@endsection

