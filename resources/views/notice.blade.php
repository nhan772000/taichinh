<?php 
   		$id = Auth::user()->id;  

?>
@extends('layouts.master')
@section('content')
<body>
    <style>
         .notice  .alert-readed{
             background: #ccc !important;
            color: #000 !important;
        }
        .notice .alert {
            margin-bottom: 2px !important;
            border: 0;
            border-radius: 0;
            padding: 20px 15px !important;
            line-height: 20px;
            font-weight: 300;
            color: #fff;
            text-align: left !important;
        }
        
        .notice .alert .alert-icon {
            display: block;
            float: left;
            margin-right: 1.071rem;
        }
        
        .notice .alert b {
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
        }
        
        .notice .close {
            float: right;
            font-size: 1.5rem;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }
        .notice .alert .close {
            color: #fff;
            position: unset !important;
            text-shadow: none;
            opacity: .9;
        }
        .notice .alert .close i {
            font-size: 20px;
        }
        .notice .alert .close:hover{
            opacity: 1;
            color: #fff;
        }
        .notice .alert.alert-info {
            background-color: #00cae3;
            color: #fff;
        }
        
        .notice .alert.alert-success {
            background-color: #55b559;
            color: #fff;
        }
        
        .notice .alert.alert-warning {
            background-color: #ff9e0f;
            color: #fff;
        }
        
        .notice .alert.alert-danger {
            background-color: #f55145;
            color: #fff;
        }
        
        .notice .alert.alert-primary {
            background-color: #a72abd;
            color: #fff;
        }
        
    </style>
<div class="container body">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h2>Notice</h2>

          </div>
        </div>
        <div class="row notice">
            <div class="col-xs-12">
                @foreach($listNotice as $notice)
                    @if($notice->notice_typeorder == 0)
                    <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-danger  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã rút {{$notice->notice_point}}<br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                    @elseif($notice->notice_typeorder == 1)
                        @if($notice->notice_typewallet == 0)
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-success  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã nạp {{$notice->notice_point}} vào ví chính
                            <br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                        @else
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-success  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã nạp {{$notice->notice_point}} vào ví phụ<br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                        @endif
                    @elseif($notice->notice_typeorder == 2)
                        @if($id == $notice->notice_fromuser)
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-success  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã nhận {{$notice->notice_point}} từ {{$notice->notice_fromuser}} <br/><span> vào lúc{{$notice->created_at}}</span>
                        </div>
                    </div>
                        @else
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-alert  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã chuyển {{$notice->notice_point}} đến {{$notice->notice_touser}} <br/><span> vào lúc{{$notice->created_at}}</span>
                        </div>
                    </div>
                        @endif

                    @elseif($notice->notice_typeorder == 3)
                        <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-primary  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã nhận cashback {{$notice->notice_point}} từ {{$notice->notice_fromuser}}<br/><span> vào lúc  {{$notice->created_at}}</span>
                        </div>
                    </div>
                    @elseif($notice->notice_typeorder == 4)
                        @if(0 == $notice->notice_typewallet)
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-danger  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã bị trừ {{$notice->notice_point}} tài khoản chính vì transfer special<br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                        @else
                            <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-primary  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b>Bạn đã được cộng {{$notice->notice_point}} tài khoản tiết kiệm vì transfer special<br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                        @endif
                    @elseif($notice->notice_typeorder == 5)
                        <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-primary  not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã cộng {{$notice->notice_point}} vào ví hạn mức nhờ phát triển thị trường<br/><span> vào lúc {{$notice->created_at}}</span>
                        </div>
                    </div>
                    @elseif($notice->notice_typeorder == 6)
                        <div id="{{$notice->id}}" onclick="read(this.id)" class="alert alert-primary not{{$notice->id}}  <?php if($notice->notice_read_status == 1) echo "alert-readed"; ?>">
                        <div>
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                
                            <b>Info alert:</b> Bạn đã nhận MLM {{$notice->notice_point}} từ {{$notice->notice_fromuser}}<br/><span> vào lúc{{$notice->created_at}}</span>
                        </div>
                    </div>
                    @endif 
                @endforeach
            </div>
            {{ $listNotice->render() }}

        </div>
        <script>
            function read(id) {
                  $.ajax({
                  url:'<?php echo url()->current(); ?>/readNotice/' + id,
                  type:'get',
                  data: {id: id},
                  success: function(result){
                    $(".not"+id).css('background-color', '#ccc');
                    $(".not"+id).css('color', '#000');
                  }
                });
            }

            
        </script>
        
    </div>
</div>
</div>
</div>
</body>
@endsection
