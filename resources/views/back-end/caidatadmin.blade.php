@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
		<div class="panel panel-primary">
			<div class="panel-heading text-center">CÀI ĐẶT TỈ LỆ</div>
			<div class="panel-body">
			<form action="{{URL::to('/admin/getcaidat')}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="exampleInputEmail1">1000 đồng = (? điểm)</label>
					<input required type="number" class="form-control" id="diem" placeholder="Nhập số điểm" name="diem" value="<?php echo $result['attributes']['setting_rate_point'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Phí giao dịch (%)</label>
					<input  type="number" class="form-control" id="phi" placeholder="Nhập phí giao dịch" name="phi" min="0" max="100" step="0.01" value="<?php echo $result['attributes']['setting_rate_phigd'] ?>">
				</div>
				<div class="form-group">
					<label for="sel1">Số phần vào ví chính:</label>
					<select required class="form-control" id="sel1" name="VC">
						<?php 
							for($i=1; $i < 10; $i++){
						?>
						<option value="{{$i}}" <?php if($result['attributes']['setting_rate_vichinh'] == $i) echo 'selected';?>>{{$i}}</option>
							<?php }?>
					</select>
					<label for="sel1">Số phần vào ví tiết kiệm:</label>
					<p id="VTK" class="alert alert-success"><?php echo 10-$result['attributes']['setting_rate_vichinh']?></p>
					</p>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>
</div>

</div>
<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection