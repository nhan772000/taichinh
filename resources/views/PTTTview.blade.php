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
            @if($checkpttt == true)
                <a class="button" href="{!!url('/postpttt')!!}">GIFT</a>
            @endif
      </div>
    </div>
  </div>
</div>

</body>
@endsection
