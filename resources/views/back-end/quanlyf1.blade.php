<?php

use App\User;
use App\Admin_users;

?>
@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="panel panel-primary">
		<div class="panel-heading text-center">CÁC F1 CỦA ID <?= $idCha ?></div>
		<div class="panel-body">
                <table id="userstable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <th>ID</th>
                        <th>USER NAME</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>LEVEL</th>
                        <th>PHONE</th>
                        <th>STATUS</th>
                        <th>MAIN WALLET</th>
                        <th>ECO WALLET</th>
                        <th>EXT WALLET</th>
                        <th>KYC LEVEL</th>
                        <!-- <th></th>
                        <th></th>
                        <th>  </th> -->
                    </thead>
                   <tbody>
                        @foreach ($users as $user)
                        
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->user_username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_current_address}}</td>
                            <td>{{$user->user_level}}</td>
                            <td>{{$user->user_phone}}</td>
                            <td>{{$user->user_status}}</td>
                            <td>{{$user->main_wallet_point}}</td>
                            <td>{{$user->eco_wallet_point}}</td>
                            <td>{{$user->ext_wallet_point}}</td>
                            <td>{{$user->user_type}}</td>
                            <!-- <td><a href="edit?id={{$user->id}}">Sửa</a></td>
                            <td><a href="delete?id={{$user->id}}">Xóa</a></td>
                            <td><a href="quanlyf1?id={{$user->id}}">Xem F1</a></td> -->
                            
                        </tr>
                        @endforeach
                    </tbody>
                   

                </table>


            </div>

        </div>
        <a class="btn btn-primary" href="quanlythanhvien">Back</a>
    </div>
    

    @endsection