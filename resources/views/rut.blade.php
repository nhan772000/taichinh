@extends('layouts.master')
@section('content')
<body>

<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well well-sm">
        <h2 class="text-center">Rút</h2>
        <form action="{{url('form-Rut')}}" method="post">
          <p class="alert alert-warning">bạn có thể rút tối đa 1000 point</p>
          <div class="form-group">
            <label for="sodiem">Số điểm bạn muốn rút:</label>
            <input required type="number" class="form-control" id="sodiem" placeholder="Số điểm" name="point">
          </div>
          <div class="form-group">
            <label for="currency">Bạn muốn rút qua:</label>
            <select required id="chonloairut" class="form-control" id="currency" name="currency">
              <option selected disabled>--Select typer--</option>
                  <option value="1">VND</option>
                  <option value="2">USDT</option>
                  
            </select>
          </div>
          <div id="select_VND_or_USDT" class="form-group">
           
          </div>
           <div class="form-group">
            <label for="description">Ghi chú:</label>
            <input type="text" class="form-control" name="description" placeholder="Ghi chú gì đó??">
          </div>
          
          <label for="pwdtt">Account password:</label>
          <div class="input-group form-group">
            <input required type="password" class="form-control" id="pwdtt" placeholder="Account password" name="pwdtt">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
         
          <button type="submit" class="btn btn-success btn-block" name="rut">Rút</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection