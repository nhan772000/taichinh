<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <title>Document</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="{{URL::to('public/css/style.css')}}">
</head>


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
        <form action="{{URL::to('/passwordreset/end-get-password')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}<br/>
              @endforeach
            </div>
            @endif

            @if(Session('message'))

            <div class="alert alert-danger text-center">
              {{Session('message')}}
            </div>
            @endif
            <label for="email_verified">Verification:</label>
            <input required type="text" class="form-control" id="email_verified" placeholder="Please enter email user..." name="email_verified">
          </div>
          <div class="form-group">
            <label for="password">New password:</label>
            <input required type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <label for="password_again">New password again:</label>
            <input required type="password" class="form-control" id="password_again" placeholder="Password again" name="password_again">
          </div>
          
          <div class="form-group">
            <a href="{{URL::to('/login')}}">Sign in ?</a>
          </div>
          <input required type="hidden" class="form-control" id="remember_token" name="remember_token" value="{{$remember_token}}">
          <input required type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user_id}}">
          <button type="submit" class="btn btn-default btn-block" name="getpassword">Accept</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="js.js"></script>
</body>
</html>