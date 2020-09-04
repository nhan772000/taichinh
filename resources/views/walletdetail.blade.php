@extends('layouts.master')
@section('content')
<body>

<div class="container mevivu_vi body">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col kcol text-center uppercase">
                    <h2 class="ktitle kwhite uppercase">Main Wallet</h2>
                    <h3 class="kwhite"><b>Balance: </b><span>{{ $wallet_amount }} Point</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col kcol2  text-center uppercase">
                    <div class="row">
                        <div class="table-history col-xs-12">
                            <table id="table-history" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Point</th>
                                        <th>Amount</th>
                                        <th>Type Order</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>                         
                                @foreach ($wallet_histories as $wallet_history)
                                    <tr>
                                        <td>{{ $wallet_history->wallet_history_id }}</td>
                                        @if ($wallet_history->wallet_history_type == 0)
                                            <td>-{{ $wallet_history->wallet_history_amount }} Points</td>
                                        @else
                                            <td>+{{ $wallet_history->wallet_history_amount }} Points</td>
                                        @endif
                                        @if ($wallet_history->wallet_history_type == 0)
                                            <td>-{{ $wallet_history->wallet_history_amount }}000 VND</td>
                                        @else
                                            <td>+{{ $wallet_history->wallet_history_amount }}000 VND</td>
                                        @endif
                                        @if($wallet_history->wallet_history_typeorder == 0)
                                            <td><button class="btnt btn btn-success">Withdraw</button></td>
                                        @elseif($wallet_history->wallet_history_typeorder == 1)
                                            <td><button class="btnt btn btn-success">Deposit</button></td>
                                        @endif
                                        <td>{{ $wallet_history->created_at }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Point</th>
                                        <th>Amount</th>
                                        <th>Type Order</th>
                                        <th>Time</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready( function () {
                    $('#table-history').DataTable();
                } );
            </script>
        </div>
    </div>
</div>
@endsection