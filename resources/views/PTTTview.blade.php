@extends('layouts.master')
@section('content')
<body>
<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-sm-offset-0">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h2 class="uppercase" style="color: #009E4E;">Thank you</h2>
          </div>
          <div class="col-xs-12 text-left">
              <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                  <div class="letters" style="border: 1px solid #009E4E; padding: 10px; border-radius: 10px; margin: 10px;">
                    <p>
                      "To thank you for helping our community thrive, we have prepared gifts for you. Once you qualify, we will prepare you a gift below. Best regards."
                    </p>
                  </div>
                  <div class="gift">
                      @if($checkpttt == true)
                      <h5 style="color: #009E4E;">GIFT Place</h5>
                        <div class="text-center">
                        <a class="button btn btn-info uppercase" href="{!!url('/postpttt')!!}">receiving gifts({{$count_gift}})</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
@endsection
