@extends('layouts.master')
@section('content')
<body>
<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h2>Score Transfer</h2>
          </div>
          <div class="col-xs-12">

            <p>Người chuyển: {{$user->user_name}}</p>
            <p>Chuyển từ: <?php if($data->user_choosewallet == 1) echo "Ví chính"; else echo "Ví phụ";?></p>
            <p>Số Điểm: {{$data->point_transfer}}</p>
            <p>Người nhận: {{$user_transfer_point->user_name}}</p>
            <p>nội dung: {{$data->transfer_content}}</p>
            
            <form action="{{URL::to('/xacnhan-chuyen/')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id_transfer" value="{{$user_transfer_point->id}}" />
              <input type="hidden" name="type_wallet" value="{{$data->user_choosewallet}}" />
              <input type="hidden" name="point_transfer" value="{{$data->point_transfer}}" />
              <a class="btn btn-danger" href="{{URL::to('/chuyen')}}">Cancel</a>
              <input class="btn btn-success" type="submit" name="accept_transfer" value="Accept" />
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

</body>
@endsection