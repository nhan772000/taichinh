@extends('layouts.master')
@section('title', 'Transaction History')
@section('content')
<body>
    <div class="container body">
      <div class="row">
        <div class="col-xs-12">
        <h2>Lịch sử giao dịch của {{Auth::user()->name}}</h2>
            <div class="row">
              <div class="col-xs-6 form-group">
                <input type='date' name="ngaygiaodich" id="ngaygiaodich" class="form-control"/>
              </div>
              <div class="col-xs-6 form-group">
                <select class="form-control" name="loaigiaodich" id="loaigiaodich">
                  <option value="">Chọn lịch sử giao dịch</option>
                  <option value="2">LS Thanh Toán</option>
                  <option value="3">LS Nhận</option>
                  <option value="4">LS nạp </option>
                  <option value="5">LS rút</option>
                  <option value="6">LS Tăng hạng mức</option>
                </select>

              </div>
              <div class="form-group text-center">
                <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
    
                <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
              </div>
            </div>
           
        </div>
        <div class="col-xs-12">
          @if (isset($message))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
          @else
          <table id="transactionTable" class="text-center cell-border hover compact">
            <input id="myInput" class="form-control" style="margin-bottom: 2%" type="text" placeholder="Search..">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Explain</th>
                  <th>Date</th>
                  <th>Points</th>
                  <th>Content</th>
                  <th>ID</th>
                </tr>
              </thead>
          </table>
          @endif
        </div>
      </div>
    </div>
    
<script>
  $(document).ready(function(){
    fill();
    function fill (ngaygiaodich = '', loaigiaodich = '') {
        var table = $('#transactionTable').DataTable({
            dom : '<"wrapper"ltip>',
            serverSide: true,
            ajax: {
                url: "{{ route('transaction.index') }}",
                data: {
                    ngaygiaodich: ngaygiaodich,
                    loaigiaodich: loaigiaodich
                }
            },   

            columns:[
              {
                data: 'transaction_status',
                name: 'transaction_status',
                
                render: function (data, type, row) {
                    if(data == '1'){
                      return '<span class="label label-success">Success</span>';
                    } 
                    else if( data == '0'){
                      return '<span class="label label-warning">Pending</span>';
                    } else {
                      return '<span class="label label-danger">Cancelled</span>';
                    }
                }
              },
              {
                data: 'transaction_order',
                name: 'transaction_order',

                render: function (data, type, row) {
                    switch(data)
                    {
                      case 2 : return '<span>GD Thanh Toán</span>'; 
                      break;
                    case 3 : return '<span>GD Nhận </span>'; 
                      break;
                    case 4 : return '<span>GD Nạp </span>'; 
                      break;
                    case 5 : return '<span>GD Rút </span>'; 
                      break;
                    case 6 : return '<span>GD Tăng HM </span>'; 
                      break;
                    }
                }
              },
              {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row){
                  data = data.split(" ");
                  return data[0].split("-").reverse().join("/");
                }
              },
              {
                data: 'transaction_point',
                name: 'transaction_point'
              },
              {
                data: 'transaction_description',
                name: 'transaction_description'
              },
              {
                data: 'transaction_id',
                name: 'transaction_id'
              }
            ]
        });
    }

    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $('#filter').click(function(){
        var ngaygiaodich = $('#ngaygiaodich').val();
        var loaigiaodich = $('#loaigiaodich').val();
        if(ngaygiaodich != '', loaigiaodich != '')
        {
          $('#transactionTable').DataTable().destroy();
          fill(ngaygiaodich,loaigiaodich);
        } else {
          alert('Please choose both');
        }
        
    });

    $('#reset').click(function(){
        $('#ngaygiaodich').val(null);
        $('#loaigiaodich').val(null);
        $("#myInput").val('');
        $('#transactionTable').DataTable().destroy();
        fill();
    });
  });

</script>

    </body>
@endsection