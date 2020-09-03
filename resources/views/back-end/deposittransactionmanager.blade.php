@extends('back-end.layouts.master')
@section('content')
 

            <div style="float: right; margin-top: 10px;" class="col col-xs-10 col-sm-offset-0">
                <div class="well well-sm">
                    <div class="row ">
                        <div class="col-xs-12 text-center">
                            <h2>Transaction Manager</h2>
                        </div>
                    </div>
                    <div class="row">
                     
                        <div class=" col-xs-12 text-center" style="overflow-x:auto;">
                              

                            <table id="transactiontable" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checktop checkrow"></th>
                                        <th>ID</th>
                                        <th>ID user</th>
                                        <th>Type</th>
                                        <th>ID Checker</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Point</th>
                                        <th>Description</th>
                                        <th>Bill</th>
                                        <th>Bill2</th>
                                        <th>Status</th>
                                        <th>Updated time</th>
                                        <th>Edit</th>
                                        <th>Accept</th>
                                        <th>Cancel</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($transactions as $transaction)
                                <tr id="row{{ $transaction->transaction_id }}">
                                    <td><input type="checkbox" id="{{ $transaction->transaction_id }}" class="checkrow"></td>
                                    <td>  {{ $transaction->transaction_id }} </td>
                                    <td> {{ $transaction->transaction_ofuser}} </td>
                                    <td> 
                                        @if($transaction->transaction_order == 0)
                                            <button class="btnt btn btn-success">Withdraw</button>
                                        @else
                                            <button class="btnt btn btn-primary">Deposit</button>
                                        @endif

                                    </td>
                                    <td> {{ $transaction->transaction_checker }} </td>
                                    <td> 
                                          @if($transaction->transaction_type == 0)
                                            <button class="btnt btn btn-success">VND</button>
                                        @else
                                            <button class="btnt btn btn-primary">USDT</button>
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
                                            <img class="modal-content" style="width:300px;" id="img01">
                                           <div id="caption" style="color: red; font-weight: 700; font-size: 20px;">
                            
                                           </div>
                                       <button onclick="closeImg()" id="close">X</button>
                                       </div>
                                            
                                    </td>
                                    <td>
                                        @if($transaction->transaction_bill2 == null)
                                            <span>...</span>
                                        @else
                                            <img onclick="ShowImg(this.src,this.alt)" id="img2{{ $transaction->transaction_id }}" src="{{asset($transaction->transaction_bill2)}}" width="50px" alt="Bill2 Transaction {{ $transaction->transaction_id }}"/>

                                        @endif
                                        
                                        <div id="myModal" class="modal row">
                                            <img class="modal-content" style="width:300px;" id="img01">
                                           <div id="caption" style="color: red; font-weight: 700; font-size: 20px;">
                            
                                           </div>
                                       <button onclick="closeImg()" id="close">X</button>
                                       </div>
                                            
                                    </td>
                                    <td > 
                                        @if($transaction->transaction_status =='0')
                                            <button id="stt{{ $transaction->transaction_id }}"  class="btnt btn btn-secondary" value="{{$transaction->transaction_status}}">Pending</button>
                                        @elseif($transaction->transaction_status =='1')
                                            <button id="stt{{ $transaction->transaction_id }}" class="btnt btn btn-success" value="{{$transaction->transaction_status}}">Approved</button>
                                        @else
                                            <button id="stt{{ $transaction->transaction_id }}" class="btnt btn btn-danger" value="{{$transaction->transaction_status}}">Canceled</button>
                                        @endif
                                    </td>
        
                                    {{-- <td> <script language="javascript">var string = "{{ $transaction->updated_at}}";document.write(string.slice(5, 7)+'/'+string.slice(8, 10)+'/'+string.slice(0, 4));</script></td> --}}
                                    <td>{{date("d/m/Y",strtotime($transaction->created_at)) }}</td>
                                    <td><button onclick="window.location.href='<?php echo url()->current(); ?>/editTransaction/{{ $transaction->transaction_id }}'" id="{{ $transaction->transaction_id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>

                                    @if($transaction->transaction_status =='0')
                                        <td><button onclick="Accept(this.id)" id="{{ $transaction->transaction_id }}"  class="a{{ $transaction->transaction_id }} btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button onclick="Cancel(this.id)" id="{{ $transaction->transaction_id }}" class="c{{ $transaction->transaction_id }} btn btn-info btn-xs" ><span class="glyphicon glyphicon-remove"></span></button></td>        
                                    @else
                                        <td><button disabled id="Accept"  class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button disabled id="cancel" class="btn btn-info btn-xs"  ><span class="glyphicon glyphicon-remove"></span></button></td>        
                                    @endif
                                    <td>
                                        <button  class="btn btn-danger btn-xs" data-target="#deletemodal{{ $transaction->transaction_id }}" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button>
                                        <div class="modal fade" id="deletemodal{{ $transaction->transaction_id }}" tabindex="-1" role="dialog" >
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    Confirm to delete this transaction!
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button onclick="Delete(this.id)" id="{{ $transaction->transaction_id }}" data-dismiss="modal" type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>        

                                </tr>
                               
                                @endforeach
                                 </tbody>
                               <tfoot>
                                <tr>
                                        <td><input type="checkbox"  class="checkbot checkrow"></td>
                                        <td>ID</td>
                                        <td>ID user</td>
                                        <td>Type</td>
                                        <td>Checker</td>
                                        <td>Currency</td>
                                        <td>Amount</td>
                                        <td>Point</td>
                                        <td>Description</td>
                                        <td>Bill</td>
                                        <td>Bill2</td>
                                        <td>Status</td>
                                        <td>Updated time</td>
                                        <td>Edit</td>
                                        <td>Accept</td>
                                        <td>Cancel</td>
                                        <td>Delete</td>
                                    </tr>
                               </tfoot>
                            </table>
                                                
                           
                        </div>
                        
                </div>
            </div>
            <script type="text/javascript">
                    $(document).ready( function () {
                                
                                
                        var table = $('#transactiontable').DataTable({
                           
                            columnDefs: [
                            {
                               
                                "orderable": false,
                                    targets: [0]
                            },
                            {
                                targets: [11],
                                "type": "date"
                            }
                            ],
                            "dom": '<"toolbar">frtip',
                            
                                    });
                        $("div.toolbar").html('<span style="margin-right: 20px;"><select id="selectaction"><option value="No" selected>Action</option><option value="accept">Accept</option><option value="cancel">Cancel</option><option value="delete">Delete</option></select><button id="actionselected">Do Action</button></span><span  class="filldate"><input type="date" id="datemin" name="datemin"><input type="date" id="datemax" name="datemax"><button id="filldate" type="button">Fillter</button></span>');
                        $.fn.dataTable.ext.search.push(
                        function (settings, data, dataIndex) {
                            var valid = true;
                            var min = moment($("#datemin").val());
                            if (!min.isValid()) { min = null; }
                            console.log(min);
                            var max = moment($("#datemax").val());
                            if (!max.isValid()) { max = null; }
                    
                            if (min === null && max === null) {
                                // no filter applied or no date columns
                                valid = true;
                            }
                            else {
                                $.each(settings.aoColumns, function (i, col) {
                                    if (col.type == "date"){
                                        var cDate = moment(data[i],'DD/MM/YYYY');

                                    console.log(cDate);
                                        if (cDate.isValid()) {
                                            if (max !== null && max.isBefore(cDate)) {
                                                valid = false;
                                            }
                                            if (min !== null && cDate.isBefore(min)) {
                                                valid = false;
                                            }
                                        }
                                        else {
                                            valid = false;
                                        }
                                    }   
                                });
                            }
                            return valid;
                    });
            $("#filldate").click(function () {
                        $('#transactiontable').DataTable().draw();
                  });
            });

                                   
               
            </script>
            
            <script type="text/javascript">
                $('.checktop').click(function () {    
                    $('input.checkrow').prop('checked', this.checked);  
 
                });
                $('.checkbot').click(function () {    
                    $('input.checkrow').prop('checked', this.checked);  
  
                });

                $(document).ready( function () {
                    $('#actionselected').click(function(){
                        var arr_id = [];
                        $(':checkbox:checked').each(function(i){
                            arr_id[i] = $(this).attr('id');
                        });
                        if (arr_id == 0){
                            alert('Check one!');
                        }else{
                            arr_id.forEach(function(element){
                                if($("#stt"+element).val() != 0){
                                    arr_id.splice(arr_id.indexOf(element), 1);
                                }
                            });
                            var select = document.getElementById('selectaction');
                            if (select.value == "delete"){
                                if( confirm("Confirm to delete!")){
                                    Delete(arr_id);
                                }
                            }else if(select.value == "cancel"){
                                if( confirm("Confirm to cancel!")){
                                  Cancel(arr_id);
                                }
                            }else if(select.value == "accept"){
                                if( confirm("Confirm to accept!")){
                                    Accept(arr_id);
                                }
                            }
                                
                                
                            }
                        
                        
                    });
                });
                

            </script>
            <script type="text/javascript">
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
                var close = document.getElementById("close");

                // When the user clicks on <span> (x), close the modal
                function closeImg(){

                    modal.style.display = "none";
  
}
            </script>

        <script type="text/javascript">
            function Accept(arr_id){ 
               $.ajax({
                    url: '<?php echo url()->current(); ?>/acceptTransaction/'+arr_id,
                    type: 'get',
                    data: {arr_id: arr_id},
                    success: function(result){
                        if(Array.isArray(arr_id)){
                            arr = arr_id
                        }else{
                            arr = [];
                            arr[0] = arr_id;
                        }   
                        arr.forEach(function(element){
                            $('#stt' + element).css('color','#fff' );
                            $('#stt' + element).css('background-color','#8ad919');
                            $('.c' + element).attr('disabled','disabled');
                            $('.a' + element).attr('disabled','disabled');
                            $('#stt' + element).html('Apporved');
                        });
                     
                }
            });
           
            }   
            function Cancel(arr_id){   
                 
                $.ajax({
                     
                    url: '<?php echo url()->current(); ?>/cancelTransaction/'+arr_id,
                    type: 'get',
                    data: {arr_id: arr_id},
                    success: function(result){
                        if(Array.isArray(arr_id)){
                            arr = arr_id
                        }else{
                            arr = [];
                            arr[0] = arr_id;
                        }   
                        arr.forEach(function(element){
                            $('#stt' + element).css('color','#fff' );
                            $('#stt' + element).css('background-color','#f9243f' );
                            $('#stt' + element).html('Canceled');
                            $('.c' + element).attr('disabled','disabled');
                            $('.a' + element).attr('disabled','disabled');   
                        });
                        
                    }
              });
             
              }  
              function Delete(arr_id){   
                 $.ajax({
                     
                      url: '<?php echo url()->current(); ?>/deleteTransaction/'+arr_id,
                      type: 'get',
                      data: {arr_id: arr_id},
                      success: function(result){
                        if(Array.isArray(arr_id)){
                            arr_id.forEach(element => $('#row'+element).css('display','none'));
                        }else{
                            $('#row'+arr_id).css('display','none');
                        }
                        
                  }
              });
             
              }   


        </script>
    
@endsection



