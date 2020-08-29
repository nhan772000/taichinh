@extends('layouts.master')
@section('content')
<body>
    <div class="body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2>Transaction Manager</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                               
                            <table id="transactiontable" class="table table-bordred table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Email request</th>
                                    <th>Type</th>
                                    <th>Checker</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Point</th>
                                    <th>Description</th>
                                    <th>Bill</th>
                                    <th>Status</th>
                                    <th>Create time</th>
                                    <th>Update time</th>
                                    <th>Edit</th>
                                    <th>Accept</th>
                                    <th>Cancel</th>
                                </thead>
                                <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr id="row{{ $transaction->transaction_id }}">
                                    <td>  {{ $transaction->transaction_id }} </td>
                                    <td> {{ $transaction->transaction_ofuser}} </td>
                                    <td> 
                                        @if($transaction->transaction_order == 0)
                                            <span>Withdraw</span>
                                        @else
                                            <span>Deposit</span>
                                        @endif

                                    </td>
                                    <td> {{ $transaction->transaction_checker }} </td>
                                    <td> {{ $transaction->transaction_type }} </td>
                                    <td> {{ $transaction->transaction_amount }} </td>
                                    <td> {{ $transaction->transaction_point }} </td>
                                    <td> {{ $transaction->transaction_description}}</td>
                                    <td>
                                        @if($transaction->transaction_bill == null)
                                            <span>...</span>
                                        @else
                                            <img src="{{asset($transaction->transaction_bill)}}" width="50px"/>

                                        @endif
                                    </td>
                                    <td> 
                                        @if($transaction->transaction_status =='0')
                                            <span>Pending</span>
                                        @elseif($transaction->transaction_status =='1')
                                            <span>approved</span>    
                                        @else{
                                            <span>Cancel</span>
                                        @endif
                                    </td>
                                    <td> {{ $transaction->updated_at}}</td>
                                    <td> {{ $transaction->created_at}}</td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="edit" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Accept"><button id="{{ $transaction->transaction_id }}"  class="btn btn-danger btn-xs" data-title="Accept" data-toggle="modal" data-target="#accept" ><span class="glyphicon glyphicon-ok"></span></button></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Cancel"><button id="cancel" class="btn btn-danger btn-xs" data-title="Cancel" data-toggle="modal" data-target="#cancel" ><span class="glyphicon glyphicon-remove"></span></button></p></td>        
                                </tr>
                               
                                @endforeach
                                 </tbody>
                            </table>
                                                
                           
                        </div>
                        <div class="col-xs-12 text-center">

                        {!! $transactions->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {

            $(document).on("click","",function() {
            var transaction_id = $(this).data('transaction_id');
            
            $.ajax({
                url: 'transaction/acceptTransaction/' + transaction_id,
                type: 'post',
                success: function(response){
                alert(response);
                }
            });
           
            });
        });
        


    </script>
</body>
@endsection
