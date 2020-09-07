@extends('layouts.master')
@section('content')





<body>

  <div class="container body">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <div class="well well-sm">
          <h2 class="text-center">Payment</h2>
          <div class="panel-group" id="accordion">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title text-center">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    Mua hạng mức</a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 text-left">
                      <div class="form-group">
                        <!--tang han muc -->
                        <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif -->


                        <form action="{{url('/tangHMa')}}" method="GET">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="muahangmuc">Bạn muốn mua bằng:</label>
                            <select class="form-control" name="muahangmuc">
                              <option name="otp-vichinh" value="otp_vichinh">Ví chính</option>
                              <option name="otp-viphu" value="otp_viphu">Ví phụ</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label for="point">Bạn muốn mua bao nhiêu HM:</label>
                            <input type="text" class="form-control" name="point" placeholder="point">
                            @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first('point') }}</div>
                            @endif
                            <!--  khi nhập điểm thì hiện ra -->
                            <p class="alert alert-warning">Bạn cần 500 điểm trong ví này </p>
                          </div>
                          <label for="pwdtt">Account password:</label>
                          <div class="input-group form-group">
                            <input type="password" class="form-control" id="pwdtt" placeholder="Account password"
                              name="pwdtt">
                            <div class="input-group-btn">
                              <button class="showhidepwdtt btn btn-default" type="button">
                                <i class="glyphicon glyphicon-eye-open"></i>
                              </button>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success btn-block" name="buy">Buy</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-success">
              <div class="panel-heading ">
                <h4 class="panel-title text-center">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Xem quảng cáo</a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">

                    <!-- 20 video -->
                    <div class="col-xs-6">
                      <video width="100%" height="200" poster="customLogo.png" preload="none" autoplay controls>
                        <source src="test.mp4" type="video/mp4">
                      </video>
                    </div>
                    <div class="col-xs-6">
                      <video width="100%" height="200" poster="customLogo.png" preload="none" controls>
                        <source src="test.mp4" type="video/mp4">
                      </video>
                    </div>
                    <div class="col-xs-6">
                      <iframe width="100%" height="200" src="https://www.youtube.com/embed/tgbNymZ7vqY?controls=0">
                      </iframe>
                    </div>
                    <div class="col-xs-6">
                      <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY?playlist=tgbNymZ7vqY&loop=1">
                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection