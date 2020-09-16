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

                    <div id="reader" width="600px"></div>

                  <script>
                      
                     

                    var html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", { fps: 10, qrbox: 500 });
                html5QrcodeScanner.render(onScanSuccess);

                // If you want to prefer front camera
                    html5QrcodeScanner.start({ facingMode: "user" }, config, qrCodeSuccessCallback);
                    
                    // If you want to prefer back camera
                    html5QrcodeScanner.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
                    
                    // Select front camera or fail with `OverconstrainedError`.
                    html5QrcodeScanner.start({ facingMode: { exact: "user"} }, config, qrCodeSuccessCallback);
                    
                    // Select back camera or fail with `OverconstrainedError`.
                    html5QrcodeScanner.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);
                    html5QrcodeScanner.start({ deviceId: { exact: cameraId} }, config, qrCodeSuccessCallback);
                    html5QrcodeScanner.start({ deviceId: { exact: cameraId} }, config, qrCodeSuccessCallback);
                    html5QrcodeScanner.stop().then(ignore => {
                      // QR Code scanning is stopped.
                    }).catch(err => {
                      // Stop failed, handle it.
                    });
                     function onScanSuccess(qrCodeMessage) {
                                                window.location.href = 'chuyen/'
                     + qrCodeMessage;
                                        }
                  </script>
                </div>
	</div>
	</body>
@endsection