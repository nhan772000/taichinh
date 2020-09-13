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
  
  <link rel="stylesheet" href="public/css/style.css">
</head>


    
<body>

<div id="mevivu_signup" class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-8 col-lg-offset-2 ">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="public/images/customLogo.png" alt="" width="70%" />
          </div>
        </div>
        <form action="{{URL::to('/register')}}" method="post">
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
            <label for="user_introduction">Introduce code:</label>
            <input required type="text" class="form-control" id="user_introduction" placeholder="Introduce code" name="user_introduction">
          </div>
          <div class="form-group">
            <label for="user_username">Username:</label>
            <input required type="text" class="form-control" id="user_username" placeholder="Username" name="user_username">
          </div>
          <div class="form-group">
            <label for="user_name">Name:</label>
            <input required type="text" class="form-control" id="user_name" placeholder="Name" name="user_name">
          </div>

          <div class="form-group">
            <label for="user_email">Email address:</label>
            <input required type="email" class="form-control" id="user_email" placeholder="Email address" name="user_email">
          </div>
          <div class="form-group">
            <label for="user_phone">Phone number:</label>
            <input required type="tel" class="form-control" id="user_phone" placeholder="Phone number" name="user_phone">
          </div>
         
            <label for="user_password">Password:</label>
          <div class="input-group form-group">
            
            <input required type="password" class="form-control" id="user_password" placeholder="password" name="user_password">
            <div class="input-group-btn">
            <button class="showhidepwd btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <label for="user_password_pay">Account password:</label>
          <div class="input-group form-group">
            <input required type="password" class="form-control" id="user_password_pay" placeholder="Account password" name="user_password_pay">
            <div class="input-group-btn">
            <button class="showhidepwdtt btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
          </div>
          <div class="form-group">
            <label for="  user_nation">Country:</label>
            <select required class="form-control" id="  user_nation" name=" user_nation">
                  <option value="VN">VN</option>
                  <option value="EN">EN</option>
                  
            </select>
          </div>
          <div class="form-group">
            <a href="{{URL::to('/login')}}">Login ?</a>
          </div>
          <div class="alert-danger alert">
            Đây là điều khoản của chúng tôi!
          </div>
          <div class="checkbox">
            <label><input type="checkbox" id="accept" name="accept">Chấp nhận điều khoản?</label>
          </div>
          <button disabled type="submit" class="btn btn-default btn-block" id="register" name="register">Register</button>
        </form>
      </div>
    </div>
  </div>
  
  
</div>



<script src="public/js/js.js"></script>
</body>
<footer>

</footer>
</html>