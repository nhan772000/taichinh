@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="panel panel-primary">
		<div class="panel-heading text-center">CÀI ĐẶT RÚT</div>
		<div class="panel-body">
			<form action="{{URL::to('/admin/caidatrut')}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="exampleInputEmail1">Phí rút (%)</label>
					<input required type="number" class="form-control" id="phirut" name="phirut" min="0" max="100" step="0.01" value="<?= $result['attributes']['setting_naprut_phi'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tối thiểu rút</label>
					<input required type="number" class="form-control" id="toithieurut" name="toithieurut" value="<?= $result['attributes']['setting_naprut_toithieu'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Hạn mức rút chưa KYC</label>
					<input required type="number" class="form-control" id="hanmuc0" name="hanmuc0" value="<?= $result['attributes']['setting_naprut_hm0'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Hạn mức rút KYC cấp độ 1</label>
					<input required type="number" class="form-control" id="hanmuc2" name="hanmuc2" value="<?= $result['attributes']['setting_naprut_hm2'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Hạn mức rút KYC cấp độ 2</label>
					<input required type="number" class="form-control" id="hanmuc4" name="hanmuc4" value="<?= $result['attributes']['setting_naprut_hm4'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Hạn mức rút KYC cấp độ 3</label>
					<input required type="number" class="form-control" id="hanmuc5" name="hanmuc5" value="<?= $result['attributes']['setting_naprut_hm5'] ?>">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>

</div>
<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection