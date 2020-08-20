@extends('layouts.master')
@section('content')
<body>


<div id="mevivu_signin" class="container">
  
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="public/images/customLogo.png" width="70%" alt=""/>
          </div>
        </div>
        <form action="home.html" method="post">
          <div class="form-group">
            <label for="Username">Username:</label>
            <input required type="text" class="form-control" id="Username" placeholder="Username" name="Username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input required type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
          </div>
          <div class="form-group">
            <a href="signup.html">Sign Up ?</a>
          </div>
          <div class="form-group">
            <a href="#">Forgot password ?</a>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
          </div>
          
          <button type="submit" class="btn btn-default btn-block" name="dangnhap">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>





    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection