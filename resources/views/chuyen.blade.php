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
        </div>
        <form action="home.html" method="post">
          <div class="form-group">
            <label for="ChooseWallet">Choose Wallet:</label>
            <select required class="form-control" id="ChooseWallet">
                  <option>Wallet C</option>
                  <option>Wallet P</option>
                  
            </select>
          </div>
          <!-- khi chọn ví chính hiện ra -->
          <p class="alert alert-info">Bạn có thể chuyển tối đa 1000 Point</p>
          <div class="form-group">
            <label for="idmember">ID member:</label>
            <input required type="text" class="form-control" id="idmember" name="idmember" placeholder="ID member">
          </div>
          <div class="form-group">
            <label for="point">Point:</label>
            <input required type="text" class="form-control" id="point" name="point" placeholder="Point">
          </div>
          <div class="form-group">
            <label for="point">Content:</label>
            <textarea required type="text" class="form-control" id="point" name="noidung" placeholder="Content"></textarea>
            
          </div>
          <label for="pwdtt">Account password:</label>
          
             <!-- kết thúc khi chọn ví chính hiện ra -->
          <div class="input-group form-group">
            <input required type="password" class="form-control" name="pwdtt" id="pwdtt" placeholder="Account password">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <button type="submit" class="btn btn-success btn-block" name="Pay">Pay</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection