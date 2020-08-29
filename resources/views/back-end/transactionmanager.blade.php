@extends('back-end.layouts.master')
@section('content')
            <div style="float: right;" class="col col-xs-10 col-sm-offset-0">
                <div class="well well-sm">
                    <div class="row container">
                        <div class="col-xs-12 text-center">
                            <h2>Transaction Manager</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                               
                            <table id="transactiontable" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <th>ID</th>
                                    <th>ID user</th>
                                    <th>Type</th>
                                    <th>Checker</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Point</th>
                                    <th>Description</th>
                                    <th>Bill</th>
                                    <th>Status</th>
                                    <th>Create time</th>
                                    <th>Edit</th>
                                    <th>Accept</th>
                                    <th>Cancel</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr id="row{{ $transaction->transaction_id }}">
                                    <td>  {{ $transaction->transaction_id }} </td>
                                    <td> {{ $transaction->transaction_ofuser}} </td>
                                    <td> 
                                        @if($transaction->transaction_order == 0)
                                            <button class="btn btn-success">Withdraw</button>
                                        @else
                                            <button class="btn btn-primary">Deposit</button>
                                        @endif

                                    </td>
                                    <td> {{ $transaction->transaction_checker }} </td>
                                    <td> {{ $transaction->transaction_type }} </td>
                                    <td> {{ $transaction->transaction_point }}000</td>
                                    <td> {{ $transaction->transaction_point }} </td>
                                    <td> {{ $transaction->transaction_description}}</td>
                                    <td>
                                        @if($transaction->transaction_bill == null)
                                            <span>...</span>
                                        @else
                                            <img src="{{asset($transaction->transaction_bill)}}" width="50px"/>

                                        @endif
                                    </td>
                                    <td > 
                                        @if($transaction->transaction_status =='0')
                                            <button id="stt{{ $transaction->transaction_id }}"  class="btn btn-secondary">Pending</button>
                                        @elseif($transaction->transaction_status =='1')
                                            <button id="stt{{ $transaction->transaction_id }}" class="btn btn-success">Approved</button>
                                        @else
                                            <button id="stt{{ $transaction->transaction_id }}" class="btn btn-danger">Cancel</button>
                                        @endif
                                    </td>
        
                                    <td> {{ $transaction->created_at}}</td>
                                    <td><button id="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                    @if($transaction->transaction_status =='0')
                                        <td><button onclick="Accept(this.id, {{ $transaction->transaction_point }},{{ $transaction->transaction_point }})" id="{{ $transaction->transaction_id }}"  class="a{{ $transaction->transaction_id }} btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button onclick="Cancel(this.id)" id="{{ $transaction->transaction_id }}" id="cancel" class="c{{ $transaction->transaction_id }} btn btn-info btn-xs" ><span class="glyphicon glyphicon-remove"></span></button></td>        
                                    @else
                                        <td><button disabled id="Accept"  class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button disabled id="cancel" class="btn btn-info btn-xs"  ><span class="glyphicon glyphicon-remove"></span></button></td>        

                                    @endif
                                    <td><button id="delete" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></td>        

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
      
    <script type="text/javascript">
            function Accept(id, ofuser, point){  
               $.ajax({
                   
                    url: '<?php echo url()->current(); ?>/acceptTransaction',
                    type: 'post',
                    data: {
                        id: id, 
                        ofuser: ofuser, 
                        point: point},
                    success: function(result){

                        //$('#stt'+id).css('background','#8ad91');
                        //$('.c'+id).attr('disabled','disabled');
                        //$('.a'+id).attr('disabled','disabled');
                        //$('#stt'+id).html('Apporved');
                         alert('Accept Transaction');


                     
                }
            });
           
            }   
            function Cancel(id){   
                 
                 $.ajax({
                     
                      url: '<?php echo url()->current(); ?>/cancelTransaction/'+id,
                      type: 'post',
                      data: {id: id},
                      success: function(result){
                        $('#stt'+id).css('background','#f9243f !important' );
                        $('#stt'+id).html('Canceled');
                        $('.c'+id).attr('disabled','disabled');
                        $('.a'+id).attr('disabled','disabled');
                          alert('Cancel Transaction'+ id);
                  }
              });
             
              }   
              function Delete(id){   
                 
                 $.ajax({
                     
                      url: '<?php echo url()->current(); ?>/deleteTransaction/'+id,
                      type: 'post',
                      data: {id: id},
                      success: function(result){
                        document.getElementById('#row'+id).style.display = 'none';
                    
                  }
              });
             
              }   


    </script>
@endsection



