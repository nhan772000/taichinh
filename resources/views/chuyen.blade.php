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
        <form action="{{url('form-Chuyen') }}" method="post">
          <div class="form-group">
            <label for="ChooseWallet">Choose Wallet:</label>
            <select required class="form-control" id="ChooseWallet" name="wallet">
                  <option value="0">Wallet C</option>
                  <option value="1">Wallet P</option>
                  
            </select>
          </div>
          <!-- khi chọn ví chính hiện ra -->
          <p class="alert alert-info">Bạn có thể chuyển tối đa 1000 Point</p>
          <div class="form-group">
            <label for="idmember">Email tài khoản nhận:</label>
            <input required type="text" class="form-control" id="email" name="email" placeholder="Email tài khoản nhận">
          </div>
          <div class="form-group">
            <label for="point">Điểm:</label>
            <input required type="text" class="form-control" id="point" name="point" placeholder="Điểm cần chuyển">
          </div>
          <div class="form-group">
            <label for="point">Nội dung:</label>
            <textarea required type="text" class="form-control" id="point" name="description" placeholder="Nội dung"></textarea>
            
          </div>
          <label for="pwdtt">Xác nhận mật khẩu:</label>
          
             <!-- kết thúc khi chọn ví chính hiện ra -->
          <div class="input-group form-group">
            <input required type="password" class="form-control" name="pwdtt" id="pwdtt" placeholder="Mật khẩu">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <button type="submit" class="btn btn-success btn-block" name="Pay">Chuyển</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection