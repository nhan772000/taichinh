@extends('layouts.master')
@section('title', 'Transaction History')
@section('content')
<body>

    <div id="deal_story" class="container body">
      <div class="row">
        <div class="col-xs-12">
        <h2>Lịch sử giao dịch của {{Auth::user()->name}}</h2>
            <form method="GET" action="{{url('/transaction')}}">
                {{csrf_field()}}
                <div class="row">
                  <div class="col-xs-6">
                    <input type='date' name="ngaygiaodich" class="form-control"/>
                  </div>
                  <div class="col-xs-6">
                    <select class="form-control" id="sel1" name="sel1">
                      <option value="1">Lịch sử giao dịch</option>
                      <option value="2">LS Thanh Toán</option>
                      <option value="3">LS Nhận</option>
                      <option value="4">LS nạp </option>
                      <option value="5">LS rút</option>
                      <option value="6">LS Tăng hạng mức</option>
                    </select>
    
                  </div>
                  <div class="col-xs-offset-5 col-xs-2 text-center">
                    <button type="submit" class="btn btn-default" name="story">Search</button>
                  </div>
                </div>
            </form>
           
        </div>
        <div class="col-xs-12">
          <table class="table">
              <thead>
                <tr>
                  <th>Checker</th>
                  <th>Date</th>
                  <th>Content</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($message))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @else
                    @foreach ($transactions as $item)
                    @if ($item->transaction_status == 0)
                        <tr class="warning">
                            <td>{{$item->transaction_checker}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->transaction_description}}</td>
                            <td>Đang xử lý</td>
                        </tr>
                    @else
                        <tr class="active">
                            <td>{{$item->transaction_checker}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->transaction_description}}</td>
                            <td>Hoàn thành</td>
                        </tr>
                    @endif
                    
                    @endforeach
                @endif
              </tbody>
          </table>
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
    </body>
@endsection