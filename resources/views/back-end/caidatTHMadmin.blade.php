@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="panel panel-primary">
		<div class="panel-heading text-center">CÀI ĐẶT TĂNG HẠN MỨC</div>
		<div class="panel-body">
			<form action="{{URL::to('/admin/postcaidatthm')}}" method="post">
			{{ csrf_field() }}
				<label for="quantity">VC/VHM (0 đến 1)</label>
				<input required type="number" id="TL" name="TL" min="0" max="1" step="0.01" value="<?= $result['attributes']['setting_tanghm_rate'] ?>">
				<input type="submit" value="Submit">
			</form>
		
		</div>
	</div>
	
</div>
<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection