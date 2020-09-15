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
        <h3>Tên: {{$user->user_name}}<h3>
        <a class="btn btn-success1 btn-block" href="{{URL::to('/passwordreset/send-email/'.$user->remember_token.'/'.$user->id)}}" onclick="return confirm('Chúng tôi sẽ gửi mã xác nhận về email của bạn!');">Đây là bạn?</a>
        <a class="btn btn-success btn-block" href="{{URL::to('/login')}}">Đây không phải là bạn?</a>
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

<script src="js.js"></script>
</body>
</html>