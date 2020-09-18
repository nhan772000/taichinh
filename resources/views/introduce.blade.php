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
                <div class="qr_code">
                    <h3 class="text-center">Your QR</h3>
                    <div class="row margin_row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            
                            <canvas style="width:100%;" id="qr_introduce"></canvas>

                        </div>
                    </div>
                    
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
            		  <script>
            			  var qr;
            			(function() {
                                qr = new QRious({
                                element: document.getElementById('qr_introduce'),
                                size: 350,
                                value: 'https://web13.mevivu.com/taichinh/register/' + <?php echo $id;?>,
                            });
                        })();
            		  </script>
                </div>
                   
            </div>
        </div>
	</div>
	</body>
@endsection