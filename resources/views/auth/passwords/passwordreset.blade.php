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
        <form action="{{URL::to('/passwordreset')}}" method="post">
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
            <label for="user_email">Email:</label>
            <input required type="email" class="form-control" id="user_email" placeholder="Please enter email user..." name="user_email">
          </div>
          
          <div class="form-group">
            <a href="{{URL::to('/login')}}">Sign in ?</a>
          </div>
          
          <button type="submit" class="btn btn-default btn-block" name="getpassword">Accept</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="js.js"></script>
</body>
</html>