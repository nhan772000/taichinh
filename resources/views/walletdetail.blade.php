<?php
use App\User;
$id = Auth::user()->id;

?>
@extends('layouts.master')
@section('content')
<body>

<div class="container mevivu_vi body">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col kcol text-center uppercase">
                    <h2 class="ktitle kwhite uppercase">Main Wallet</h2>
                    <div class="balance">
                        <span class="balance-mini"><b><i class="fa fa-star"></i></b> {{ $wallet_amount }}</span>
                        <span class="icon-exchange"><i class="fa fa-exchange"></i></span>
                        <span class="balance-mini"><b><i class="fa fa-money"></i></b>{{ $wallet_amount }}000</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col kcol2  text-center uppercase" style="overflow: scroll;">
                    <div class="row" >
                        <div class="table-history col-xs-12" >
                            <form id="filter-form">
                                <span  class="select-date-range">
                                    <select id="date-range" name="date-range">
                                        <option value="0">--Select--</option>
                                        <option value="1">Trong ngày</option>
                                        <option value="7">Trong tuần</option>
                                        <option value="30"> Trong tháng</option>
                                    </select>
                                </span>

                                <span  class="filldate"><input type="date" id="datemin" name="datemin"><input type="date" id="datemax" name="datemax"><button id="filldate" type="button">Fillter</button></span>
                            <span><input type="reset" id="reset" value="Reset"></span>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-history col-xs-12">
                            <table id="table-history" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Point</th>
                                        <th>Amount</th>
                                        <th>Type Order</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>                         
                                @foreach ($wallet_histories as $wallet_history)
                                    <tr>
                                        @if ($wallet_history->wallet_history_type == 0)
                                            <td>-{{ $wallet_history->wallet_history_point }} Points</td>
                                        @else
                                            <td>+{{ $wallet_history->wallet_history_point }} Points</td>
                                        @endif
                                        @if ($wallet_history->wallet_history_type == 0)
                                            <td>-{{ $wallet_history->wallet_history_point }}000 VND</td>
                                        @else
                                            <td>+{{ $wallet_history->wallet_history_point }}000 VND</td>
                                        @endif
                                        @if($wallet_history->wallet_history_typeorder == 0)
                                            <td><button class="btnt btn btn-success">Withdraw</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 1)
                                            <td><button class="btnt btn btn-success">Deposit</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 2)
                                            <td><button class="btnt btn btn-success">Transfer</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 3)
                                            <td><button class="btnt btn btn-success">Cashback</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 4)
                                            <td><button class="btnt btn btn-success">MLM</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 5)
                                            <td><button class="btnt btn btn-success">Phát triển</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 6)
                                            <td><button class="btnt btn btn-success">Transfer special</button></td>
                                        @endif
                                        @if($wallet_history->wallet_history_fromuser == $wallet_history->wallet_history_touser)
                                            <td><b>You do it</b></td>
                                        @elseif($wallet_history->wallet_history_fromuser == $id)
                                            <td><b>From you to {{User::where('id', $wallet_history->wallet_history_touser)->value('email')}}</b></td>
                                        @elseif($wallet_history->wallet_history_touser == $id)
                                            <td><b>From {{User::where('id', $wallet_history->wallet_history_touser)->value('email')}} to you</b></td>
                                        @endif
                                        <td>{{date("d/m/Y",strtotime($wallet_history->created_at)) }}</td>
                                        <td>{{date("h:m:s",strtotime($wallet_history->created_at)) }}</td>
                                        
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Point</th>
                                        <th>Amount</th>
                                        <th>Type Order</th>
                                        <th>Date</th>  
                                        <th>Description</th>    
                                        <th>Time</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                 <script type="text/javascript">
               
                    $(document).ready( function () {
                     
                                
                        var table = $('#table-history').DataTable({
                           
                            columnDefs: [
                            {
                                "orderable": false,
                                    targets: [0]
                            },
                            {
                                targets: [4 ],
                                "type": "date"
                            }
                            ]
                            
                                    });
                        $.fn.dataTable.ext.search.push(
                        function (settings, data, dataIndex) {

                            var valid = true;
                            var min = moment($("#datemin").val());
                            if (!min.isValid()) { min = null; }
                            var max = moment($("#datemax").val());
                            if (!max.isValid()) { max = null; }

                            if ($("#date-range").val() != 0) {
                                var today = new Date();
                                if ($("#date-range").val() == 7) {
                                    var mindate = (today.getMonth()+1)+'/'+(today.getDate()-7)+'/'+today.getFullYear();
                                }else if ($("#date-range").val() == 30) {
                                    var mindate = today.getMonth()+'/'+today.getDate()+'/'+today.getFullYear();
                                }else if ($("#date-range").val() == 1) {
                                    var mindate = (today.getMonth()+1)+'/'+today.getDate()+'/'+today.getFullYear();
                                }
                                min = moment(mindate);
                                if (!min.isValid()) { min = null; }
                                max = null;
                            }

                            if (min === null && max === null) {
                                // no filter applied or no date columns
                                valid = true;
                                
                            }
                            else {
                                $.each(settings.aoColumns, function (i, col) {
                                    if (col.type == "date"){
                                        var cDate = moment(data[i],'DD/MM/YYYY');

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
                        $('#table-history').DataTable().draw();
                  });
                  $("#date-range").change(function () {
                        $('#table-history').DataTable().draw();
                  });
                  $("#reset").click(function () {
                    $('#table-history').DataTable().draw();

                  });
            });

            </script>
        </div>
    </div>
</div>
@endsection