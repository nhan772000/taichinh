@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="panel panel-primary">
        <div class="panel-heading text-center">EDIT</div>
        <div class="panel-body">

            <form action="{{URL::to('/admin/postedit')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input readonly type="number" class="form-control" name="id" value="{{$user->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input required type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input required type="text" class="form-control" name="userName" value="{{$user->user_username}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input required type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input required type="text" class="form-control" name="address" value="{{$user->user_current_address}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <input required type="text" class="form-control" name="level" value="{{$user->user_level}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input required type="text" class="form-control" name="phone" value="{{$user->user_phone}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stauts</label>
                    <select required class="form-control" name="status">
                        <?php
                        for ($i = 0; $i < 2; $i++) {
                        ?>
                            <option value="{{$i}}" <?php if ($user->user_status == $i) echo 'selected'; ?>>{{$i}}</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">KYC LEVEL</label>
                    <input readonly type="text" class="form-control" name="kyc" value="{{$user->user_type}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="quanlythanhvien">Back</a>
            </form>
        </div>
    </div>

</div>
<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection