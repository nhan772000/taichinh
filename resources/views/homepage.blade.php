<?php
use App\User;
$id = auth()->user()->id;
?>
@extends('layouts.master')
@section('content')
	<body>
	<div class="container body">
	        <div class="row margin_row">
	            <div class="col-sm-12">
					@if($user->transfer_status == 0)
						   <button data-toggle="modal" data-target="#modal_transfer" class="btn btn-success"><i class=" glyphicon glyphicon-refresh"></i> transfer</button>
					@endif
				</div>
		
	        </div>

	        
			<div class="modal fade" id="modal_transfer" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<form action="{{url('transfer')}}" method="get">
						{!! csrf_field() !!}

						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Transfer form</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<label>Enter point you want to transfer</label>
								<input id="transfer_point" name="transfer_point" value=""/>
								<label>Point</label>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Transfer</button>
							</div>
						</div>
					</form>
				</div>
			</div>
	    
	    <div class="row margin_row mevivu_home_sesion1">
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/0')!!}" class="btn btn-success1 button_home">
				<span>M Wallet</span><span class="icon_size amount"><?= round($main_wallet->main_wallet_point, 0, PHP_ROUND_HALF_ODD); // 9 ?></span>
			</a>
	      </div>
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/1')!!}" class="btn btn-success button_home">
				<span>Ext Wallet</span><span class="icon_size amount"><?= round($ext_wallet->ext_wallet_point, 0, PHP_ROUND_HALF_ODD); // 9 ?></span>
			</a>
	      </div>
	      <div class="col-xs-4">
			<a href="{!!url('/wallet/walletdetail/2')!!}" class="btn btn-success1 button_home">
				<span>Eco Wallet</span><span class="icon_size amount"><?= round($eco_wallet->eco_wallet_point, 0, PHP_ROUND_HALF_ODD); // 9 ?></span>
			</a>
	      </div>
	    </div>


	    <div class="mevivu_home_sesion2 row margin_row">
	      <div class="col-xs-offset-3 col-xs-3">
	        <div class="panel panel-default">
	          <div class="panel-heading text-center">Scaner QR</div>
	          <div class="panel-body">
	          <img onclick="window.location.href='<?php echo url()->current(); ?>/scanner'" src="public/images/scan.png" class="img-thumbnail" alt="Cinque Terre" width="100%"> 
	          </div>
	        </div>
	                
	      </div>
	      <div class=" col-xs-3">
	        <div class="panel panel-default">
	          <div class="panel-heading text-center">Scaner QR</div>
	          <div class="panel-body">
				<canvas id="qr-code" style="width: 100%;"></canvas> 
	          </div>
	        </div>
	                
		  </div>

		  <script>
			  var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 100,
                    value: '<?php echo $id; ?>',
                });
            })();
		  </script>
	        </div>

	            <div class="mevivu_home_sesion3 row">
	                <div class="col-xs-4 text-center">
	                    <a class="btn btn-success2 button_home"><i class="icon_size fa fa-share-square-o" aria-hidden="true"></i> Introduce</a>
	                </div>
	                <div class="col-xs-4  text-center">
	                    <a href="{{URL::to('/chuyen')}}" type="button" class="btn btn-success2 button_home"><i class="icon_size fa fa-exchange" aria-hidden="true"></i>Transfer Point</a>
	                </div>
	                <div class="col-xs-4  text-center">
	                    <a href="{!!url('/wallet')!!}" class="btn btn-success2 button_home"><i class="icon_size fa fa-briefcase" aria-hidden="true"></i> Wallet</a>
	                </div>
	      
				</div>

				<div class="mevivu_home_sesion3 row">
					<div class="col-xs-4  text-center" >
	                    <a href="https://vtopv.com/" target="_blank" class="btn btn-success2 button_home"><i class="icon_size fa fa-cart-arrow-down" aria-hidden="true"></i> Product</a>
	                </div>
	                <div class="col-xs-4  text-center" >
	                    <a class="btn btn-success2 button_home"><span class="icon_size glyphicon glyphicon-globe"></span> Commerce</a>
	                </div>
	                <div class="col-xs-4 text-center">
	                    <a data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success2 button_home"><i class="icon_size glyphicon glyphicon-send"></i> View more</a>
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

