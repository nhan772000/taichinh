@extends('layouts.master')
@section('content')

<body>

	<div class="container body">

		<div id="mevivu_signup" class="container">
		  <div class="row">
		    <div class="col-xs-12 col-sm-12 col-lg-8 col-lg-offset-2 ">
		      <div class="well well-sm">
		        <div class="row">
		          <div class="col-xs-12 text-center">
		            <h2 class="text-center">Thông tin</h2>
		          </div>
		        </div>
		        <form action="{{URL::to('/userinfo')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
		              @if(count($errors) > 0)
		            <div class="alert alert-danger">
		              @foreach($errors->all() as $err)
		                {{$err}}<br/>
		              @endforeach
		            </div>
		            @endif

		            @if(Session('message'))

		            <div class="alert alert-danger">
		              {{Session('message')}}
		            </div>
		            @endif
		          
		          @if(isset($user))
                        
                    <?php
                    	$user_type_0 = 'required';
                    	$user_verify_email = '<a class="mevivu_alert_verify" href="'.URL::to('/verify').'">Bạn cần xác minh email?</a>';
                    	$user_verify_phone = '';
				    if ($user->user_type == 1) {
				    	$user_verify_email = '';
				    	$user_verify_phone = '<a class="mevivu_alert_verify" href="'.URL::to('/verify-phone').'">Bạn cần xác minh số điện thoại?</a>';
				    	$user_type_0 = '';
				        $disabled = 'disabled';
				    }
				    elseif ($user->user_type == 2 || $user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) {
				    	$user_verify_email = '';
				    	$user_verify_phone = '';
				    	$user_type_0 = '';
				    	$disabled = 'disabled';
				    }
				    
                    ?>
                    <h3>Thông tin cơ bản</h3>
		          <div class="form-group">
		            <label for="user_name">Name:</label>
		            <input required type="text" class="form-control" id="user_name" placeholder="Name" name="user_name" value="{{$user->user_name}}">
		          </div>

		          <div class="form-group">
		            <label for="user_email">Email address:</label>
		            <input <?php if($user->user_type == 1 || $user->user_type == 2 || $user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) echo $disabled;?> {{$user_type_0}} type="email" class="form-control" id="user_email" placeholder="Email address" name="user_email" value="{{$user->email}}">
		            <?=$user_verify_email?>
		          </div>
		          
		          <div class="form-group">
		            <label for="user_phone">Phone number:</label>
		            <input <?php if($user->user_type == 2 || $user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) echo $disabled; ?> {{$user_type_0}} type="tel" class="form-control" id="user_phone" placeholder="Phone number" name="user_phone" value="{{$user->user_phone}}">
		            <?=$user_verify_phone?>
		          </div>
		          <div class="form-group">
		          	<?php
		          		$nation = 'selected = "selected"';
		          		if($user->user_nation == 'VN'){
		          			$flag = 1;
		          		}
		          		else if($user->user_nation == 'EN'){
		          			$flag = 2;
		          		}
		          	?>
		            <label for="  user_nation">Country:</label>
		            <select required class="form-control" id="  user_nation" name=" user_nation">
		            	<option <?php if($flag == 2) echo $nation; ?> value="EN">EN</option>
		                  <option <?php if($flag == 1) echo $nation; ?> value="VN">VN</option>
		                  
		                  
		            </select>
		          </div>
		          <div class="form-group">
		            <label for="user_introduction">Introduce code:</label>
		            <input disabled type="text" class="form-control" id="user_introduction" placeholder="Introduce code" name="user_introduction" value="{{$user->id}}">
		          </div>
		         
		          
		          <button type="submit" class="btn btn-default btn-block" name="update_info_basic">Update information basic</button>
		         
		        </form>
		        <form action="{{URL::to('/userinfo')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
		            <h3>Thông tin tài khoản ngân hàng</h3>
		            <div class="form-group">
		            <label for="user_ownerbank">Owner bank:</label>
		            <input type="text" class="form-control" id="user_ownerbank" placeholder="Owner bank" name="user_ownerbank" value="{{$user->user_ownerbank}}">
		          </div>
		          
		          <div class="form-group">
		            <label for="user_numbank">Number bank:</label>
		            <input  type="text" class="form-control" id="user_numbank" placeholder="Number bank" name="user_numbank" value="{{$user->user_numbank}}">
		          </div>
		          <div class="form-group">
		            <label for="user_bankname">Bank name:</label>
		            <input  type="text" class="form-control" id="user_bankname" placeholder="bank name" name="user_bankname" value="{{$user->user_bankname}}">
		          </div>
		          <div class="form-group">
		            <label for="user_address_USDT">Address USDT:</label>
		            <input  type="text" class="form-control" id="user_address_USDT" placeholder="Address USDT" name="user_address_USDT" value="{{$user->user_address_USDT}}">
		          </div>
		          
		          <button type="submit" class="btn btn-default btn-block" name="update_account_bank">Update Account Bank</button>
		        </form>
		        <form action="{{URL::to('/userinfo')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
                    <h3>Thông tin chứng minh thư</h3>
		          <div class="form-group">
		            <label for="user_name_identity">Name CMT:</label>
		            <input <?php if($user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) echo $disabled; ?> type="text" class="form-control" id="user_name_identity" placeholder="Name CMT" name="user_name_identity" value="{{$user->user_name_identity}}">
		          </div>

		          
		          
		          <div class="form-group">
		            <label for="user_number_identity">Identity number:</label>
		            <input <?php if($user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) echo $disabled; ?> {{$user_type_0}} type="tel" class="form-control" id="user_number_identity" placeholder="Identity Number" name="user_number_identity" value="{{$user->user_number_identity}}">
		          </div>
		          <div class="form-group">
		            <label for="user_identity_image">Identity Card:</label>
		            <input <?php if($user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5) echo $disabled.' style="display: none;"'; ?> type="file" class="form-control" id="user_identity_image" name="user_identity_image">
		            <div class="mevivu_img_upload">
		            	<img class="img-thumbnail" src="public/uploads/image_user/{{$user->user_identity_image}}" alt="">
		        	</div>
		          </div>
		          
		          <button type="submit" class="btn btn-default btn-block" name="update_identity">Update identity</button>
		        </form>

		        <form action="{{URL::to('/userinfo')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
                    <h3>Địa chỉ đang ở</h3>
		          <div class="form-group">
		            <label for="user_current_address">Địa chỉ:</label>
		            <input <?php if($user->user_type == 5 || $user->user_type == 4) echo $disabled; ?> type="text" class="form-control" id="user_current_address" placeholder="địa chỉ" name="user_current_address" value="{{$user->user_current_address}}">
		            <span>Ví dụ: 954 Quang Trung, Phường 8, Gò Vấp, TP.HCM, Việt Nam.</span>
		          </div>

		          <div class="form-group">
		            <label for="user_address_image">Hình ảnh địa chỉ:(Giấy điện, nước, internet, bank,...)</label>
		            <input <?php if($user->user_type == 5 || $user->user_type == 4) echo $disabled.' style="display: none;"'; ?> type="file" class="form-control" id="user_address_image" name="user_address_image">
		            <div class="mevivu_img_upload">
		            	<img class="img-thumbnail" src="public/uploads/image_user/{{$user->user_address_image}}" alt="">
		        	</div>
		          </div>
		          
		          <button type="submit" class="btn btn-default btn-block" name="update_current_address">Update Current Address</button>
		          
		        </form>

		        <form action="{{URL::to('/userinfo')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
                    <h3>Thông tin giấy phép kinh doanh</h3>
		          <div class="form-group">
		            <label for="user_name_GPKD">Chủ đứng tên GPKD:</label>
		            <input <?php if($user->user_type == 5) echo $disabled; ?> type="text" class="form-control" id="user_name_GPKD" placeholder="Name representative business license" name="user_name_GPKD" value="{{$user->user_name_GPKD}}">
		            
		          </div>
		          <div class="form-group">
		            <label for="user_MST">MST:</label>
		            <input <?php if($user->user_type == 5) echo $disabled; ?> type="text" class="form-control" id="user_MST" placeholder="MST" name="user_MST" value="{{$user->user_MST}}">
		            
		          </div>

		          <div class="form-group">
		            <label for="user_GPKD_image">Hình ảnh:</label>
		            <input <?php if($user->user_type == 5) echo $disabled.' style="display: none;"'; ?> type="file" class="form-control" id="user_GPKD_image" name="user_GPKD_image">
		            <div class="mevivu_img_upload">
		            	<img class="img-thumbnail" src="public/uploads/image_user/{{$user->user_GPKD_image}}" alt="">
		        	</div>
		          </div>
		          
		          <button type="submit" class="btn btn-default btn-block" name="update_GPKD">Update Business License</button>
		          
		        </form>


		        @endif
		      </div>
		    </div>
		  </div>
  
  
</div>




	</div>
</body>

@endsection