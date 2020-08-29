@extends('back-end.layouts.master')
@section('content')
<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 5; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
            <div style="float: right; margin-top: 10px;" class="col col-xs-10 col-sm-offset-0">
                <div class="well well-sm">
                    <div class="row ">
                        <div class="col-xs-12 text-center">
                            <h2>Transaction Manager</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                               
                            <table id="transactiontable" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
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
                                    </tr>
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
                                    <td> 
                                          @if($transaction->transaction_type == 0)
                                            <button class="btn btn-success">VND</button>
                                        @else
                                            <button class="btn btn-primary">USDT</button>
                                        @endif
                                     </td>
                                    <td> {{ $transaction->transaction_point }}000</td>
                                    <td> {{ $transaction->transaction_point }} </td>
                                    <td> {{ $transaction->transaction_description}}</td>
                                    <td>
                                        @if($transaction->transaction_bill == null)
                                            <span>...</span>
                                        @else
                                            <img onclick="ShowImg(this.src,this.alt)" id="img{{ $transaction->transaction_id }}" src="{{asset($transaction->transaction_bill)}}" width="50px" alt="Bill Transaction {{ $transaction->transaction_id }}"/>

                                        @endif
                                        <div id="myModal" class="modal row">
                                          <img class="modal-content" id="img01">
                                             <div id="caption" style="color: red; font-weight: 700; font-size: 20px;">

                                          </div>
                                           <div><button onclick="closeImg()" id="close">X</button></div>

                                       
                                        </div>
                                       
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

                                    <td><button onclick="window.location.href='<?php echo url()->current(); ?>/editTransaction/{{ $transaction->transaction_id }}'" id="{{ $transaction->transaction_id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>

                                    @if($transaction->transaction_status =='0')
                                        <td><button onclick="Accept(this.id, {{ $transaction->transaction_ofuser }}, {{ $transaction->transaction_point }},{{ $transaction->transaction_type }} )" id="{{ $transaction->transaction_id }}"  class="a{{ $transaction->transaction_id }} btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button onclick="Cancel(this.id)" id="{{ $transaction->transaction_id }}" class="c{{ $transaction->transaction_id }} btn btn-info btn-xs" ><span class="glyphicon glyphicon-remove"></span></button></td>        
                                    @else
                                        <td><button disabled id="Accept"  class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button disabled id="cancel" class="btn btn-info btn-xs"  ><span class="glyphicon glyphicon-remove"></span></button></td>        

                                    @endif
                                    <td><button  onclick="Delete(this.id)"id="{{ $transaction->transaction_id }}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></td>        

                                </tr>
                               
                                @endforeach
                                 </tbody>
                               <tfoot>
                                <tr>
                                        <td>ID</td>
                                        <td>ID user</td>
                                        <td>Type</td>
                                        <td>Checker</td>
                                        <td>Currency</td>
                                        <td>Amount</td>
                                        <td>Point</td>
                                        <td>Description</td>
                                        <td>Bill</td>
                                        <td>Status</td>
                                        <td>Create time</td>
                                        <td>Edit</td>
                                        <td>Accept</td>
                                        <td>Cancel</td>
                                        <td>Delete</td>
                                    </tr>
                               </tfoot>
                            </table>
                                                
                           
                        </div>
                        <div class="col-xs-12 text-center">
                            {{ $transactions->render() }}

                        </div>
                    </div>
                </div>
            </div>
  <script>
// Get the modal

 modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
 function ShowImg(src, alt){

    modal.style.display = "block";
  modalImg.src = src;
  $("#caption").html(alt);
}

// Get the <span> element that closes the modal
var close = document.getElementsById("close");

// When the user clicks on <span> (x), close the modal
function closeImg(){

    modal.style.display = "none";
  
}
</script>

    <script type="text/javascript">
  
            function Accept(id, ofuser, point, type){ 
               $.ajax({
                    url: '<?php echo url()->current(); ?>/acceptTransaction',
                    type: 'post',
                    data: {
                        id: id, 
                        ofuser: ofuser, 
                        point: point},
                    success: function(result){

                        $('#stt'+id).css('background','#8ad91');
                        $('.c'+id).attr('disabled','disabled');
                        $('.a'+id).attr('disabled','disabled');
                        $('#stt'+id).html('Apporved');
                         alert('Accept Transaction');


                     
                }
            });
           
            }   
            function Cancel(id){   
                 
                 $.ajax({
                     
                      url: '<?php echo url()->current(); ?>/cancelTransaction/'+id,
                      type: 'get',
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
                confirm("Bạn chắc chắn muốn xóa Transaction " + id);
                 $.ajax({
                     
                      url: '<?php echo url()->current(); ?>/deleteTransaction/'+id,
                      type: 'get',
                      data: {id: id},
                      success: function(result){
                        $('#row'+id).css('display','none' );
                        alert('Delete Transaction '+ id);

                  }
              });
             
              }   


    </script>
@endsection



