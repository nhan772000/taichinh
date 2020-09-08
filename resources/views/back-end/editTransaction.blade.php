@extends('back-end.layouts.master')
@section('content')
<div style="float: right; margin-top: 10px;" class="col col-xs-10 col-sm-offset-0">
            <div class="well well-sm">
                <div class="row ">
                        @foreach ($transaction as $transaction)
                    <div class="col-xs-12">
                            @if($transaction->transaction_bill != null)
                            <h2 class="text-center font-weight-light">Edit Deposit Transaction</h2>
                        @else
                            <h2 class="text-center font-weight-light">Edit Withdraw Transaction</h2>
                        @endif
                        <div>
                                <div class="row transaction">
                                    <form  action="{{url('form-editTransaction')}}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                            <div class="col-lg-1">
                                            </div>
                                        <div class="col-lg-10">
                                                <div class="row ">

                                        <!-- edit form column -->
                                        <div class="col-lg-4 bill text-center">
                                            @if($transaction->transaction_bill != null)
                                                <style type="text/css">
                                                    .transaction-info{
                                                        border-left: 1px solid #ddd;
                                                        padding-left: 15px;
                                                    }
                                                </style>
                                                    <h3>Bill Image</h3>
                                                    <div>
                                                    <img width="100%" src="{{asset($transaction->transaction_bill)}}"/>
                                                    </div>
                                                    <div>
                                                        <input type="file" class="form-control" name="transaction_bill"/> 
                                                    </div>
                                            @else
                                                <style type="text/css">
                                                    
                                                    .bill{
                                                        display: none;
                                                    }
                                                    .transaction-info{
                                                        width: 100%;
                                                    }
                                                </style>>

                                            @endif
                                        </div>

                                        <div class="col-lg-8 order-lg-1 transaction-info">
                                            <div class="transaction-inner">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">ID Transaction</label>
                                                    <div class="col-lg-9">
                                                        <input readonly class="form-control" type="number" name="transaction_id" value="{{ $transaction->transaction_id }}" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">ID User</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="number" name="transaction_ofuser" value="{{ $transaction->transaction_ofuser}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Order Type</label>
                                                    <div class="col-lg-3">
                                                            @if($transaction->transaction_type == 0)
                                                            <input readonly class="form-control" type="text" value="Withdraw">
                                                            @else
                                                            <input readonly class="form-control" type="text" value="Deposit">

                                                            @endif
                                                            
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Id Checker</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="number" name="transaction_checker" value="{{ $transaction->transaction_checker}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Currency Type</label>
                                                    <div class="col-lg-3">
                                                        <select  class="kira" name="transaction_type" value="{{ $transaction->transaction_type}}">
                                                            @if($transaction->transaction_type == 0)
                                                                <option value="0" selected>VND</option>
                                                                <option value="1" >USDT</option>
                                                            @else
                                                                <option value="0" >VND</option>
                                                                <option value="1" selected>USDT</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Point</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="number" name="transaction_point" value="{{ $transaction->transaction_point}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Amount</label>
                                                    <div class="col-lg-9">
                                                        <input readonly class="form-control" type="number" name="transaction_amount" value="{{ $transaction->transaction_point}}000"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" name="transaction_description" value="{{ $transaction->transaction_description}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                                    <div class="col-lg-3">
                                                            @if($transaction->transaction_status == 0)
                                                            <input readonly class="form-control" type="text" value="Pending">

                                                            @elseif($transaction->transaction_status == 1)
                                                            <input readonly class="form-control" type="text" value="Approved">

                                                            @else   
                                                            <input readonly class="form-control" type="text" value="Canceled">

                                                            @endif
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Created at</label>
                                                    <div class="col-lg-9">
                                                        <input readonly class="form-control" type="text" name="transaction_created_at" value="{{ $transaction->created_at}}"/>
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Updated at</label>
                                                    <div class="col-lg-9">
                                                        <input readonly class="form-control" type="text" name="transaction_updated_at" value="{{ $transaction->updated_at}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-center">
                                                    <div class="col-lg-12 ml-auto text-center">
                                                        <button type="submit" class="btn btn-success btn-block" name="rut">Save</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                                <div class="col-lg-1">
                                            </div>
                            </div>
                        </div>
                            </div>
                                                                    @endforeach

                        </div>
                    </div>
</div>
@endsection