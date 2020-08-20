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
              <div class="form-group">
            <label for="nap">you want type?:</label>
            <select required id="chonloainap" class="form-control" name="nap">
              <option selected disabled>--Select typer--</option>
              <option value="1">VND</option>
              <option value="2">USDT</option>
                  
            </select>
          </div>
            <!-- khi chọn VND hiện ra -->
            <div id="select_VND_or_USDT">
              
            </div>
            
          </div>
        </div>
        <form action="#" method="post">

          <div class="form-group">
            <label for="point">Point:</label>
            <input required type="text" id="point_chuyen" class="form-control" name="point" placeholder="point" >
           <!--  khi nhập điểm thì hiện ra -->
           <div id="thongbaosotien">
              
            </div>
            
          </div>
          <div class="form-group">
            <label for="picture">Phiếu CK:</label>
            <input required type="file" class="form-control" name="picture">
          </div>
          <label for="pwdtt">Account password:</label>
          <div class="input-group form-group">
            <input required type="password" class="form-control" id="pwdtt" name="pwdtt" placeholder="Account password">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <p class="alert alert-info">Ghi chú gì đó??</p>
          
          <button type="submit" class="btn btn-success btn-block" name="Pay">Nạp</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
@endsection
