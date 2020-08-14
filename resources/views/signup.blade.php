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
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 ">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="public/images/customLogo.png" alt=""/>
          </div>
        </div>
        <form action="home.html" method="post">
          <div class="form-group">
            <label for="maGioiThieu">Introduce code:</label>
            <input required type="text" class="form-control" id="maGioiThieu" placeholder="Introduce code" name="maGioiThieu">
          </div>
          <div class="form-group">
            <label for="UserName">Username:</label>
            <input required type="text" class="form-control" id="UserName" placeholder="Username" name="UserName">
          </div>
          <div class="form-group">
            <label for="HVT">Name:</label>
            <input required type="text" class="form-control" id="HVT" placeholder="Name" name="HVT">
          </div>

          <div class="form-group">
            <label for="email">Email address:</label>
            <input required type="email" class="form-control" id="email" placeholder="Email address" name="email">
          </div>
          <div class="form-group">
            <label for="SDT">Phone number:</label>
            <input required type="tel" class="form-control" id="SDT" placeholder="Phone number" name="SDT">
          </div>
         
            <label for="pwd">Password:</label>
          <div class="input-group form-group">
            
            <input required type="password" class="form-control" id="pwd" placeholder="password" name="pwd">
            <div class="input-group-btn">
            <button class="showhidepwd btn btn-default" type="button">
              <i class="glyphicon glyphicon-eye-open"></i>
            </button>
          </div>
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
          <div class="form-group">
            <label for="country">Country:</label>
            <select required class="form-control" id="country" name="country">
                  <option>VN</option>
                  <option>EN</option>
                  
            </select>
          </div>
          <div class="form-group">
            <a href="login.html">Login ?</a>
          </div>
          <button type="submit" class="btn btn-default btn-block" name="dangky">Sign Up</button>
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

<script src="public/js/js.js"></script>
</body>
<footer>

</footer>
</html>