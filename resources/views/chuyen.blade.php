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
        </div>
        <form action="{{URL::to('/chuyen')}}" method="post">
          {{ csrf_field() }}
          @if(count($errors) > 0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                    {{$err}}<br/>
                  @endforeach
                </div>
                @endif

                @if(Session('message'))

                <div class="alert alert-danger">
                  {{Session('message')}}
                </div>
                @endif
          <div class="form-group">

            <label for="user_choosewallet">Choose Wallet:</label>
            <select required class="form-control" id="user_choosewallet" name="user_choosewallet">
                  <option disabled selected value="2">---Choose Wallet---</option>
                  <option data-1={{$point_main}} value="1">Wallet C</option>
                  <option data-0={{$point_ext}} value="0">Wallet P</option>
                  
            </select>
          </div>
          <!-- khi chọn ví chính hiện ra -->
          <div id="select_wallet"></div>
          <div class="form-group">
            <label for="id_user_transfer">ID member:</label>
            <input required type="text" class="form-control" id="id_user_transfer" name="id_user_transfer" placeholder="ID member">
          </div>
          <div id="info_user_recei"></div>
          <div class="form-group">
            <label for="point_transfer">Point:</label>
            <input required type="text" class="form-control" id="point_transfer" name="point_transfer" placeholder="Point">
          </div>
          <div class="form-group">
            <label for="transfer_content">Content:</label>
            <textarea type="text" class="form-control" id="transfer_content" name="transfer_content" placeholder="Content"></textarea>
            
          </div>
          
          <label for="user_password_pay">Account password:</label>
             <!-- kết thúc khi chọn ví chính hiện ra -->
          <div class="input-group form-group">
            
            <input required type="password" class="form-control" name="user_password_pay" id="user_password_pay" placeholder="Account password">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <button type="submit" class="btn btn-success btn-block" name="Pay">Move</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
@endsection