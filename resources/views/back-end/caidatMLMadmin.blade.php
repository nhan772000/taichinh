@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="panel panel-primary">
		<div class="panel-heading text-center">CÀI ĐẶT HỆ THỐNG MLM</div>
		<div class="panel-body">
			<form action="{{URL::to('/admin/postcaidatmlm')}}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="exampleInputEmail1">F1 (%)</label>
					<input required type="number" class="form-control" name="f1" min="0" max="100" step="0.01" value="<?= $result['attributes']['F1'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F2 (%)</label>
					<input required type="number" class="form-control" name="f2" min="0" max="100" step="0.01" value="<?= $result['attributes']['F2'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F3 (%)</label>
					<input required type="number" class="form-control" name="f3" min="0" max="100" step="0.01" value="<?= $result['attributes']['F3'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F4 (%)</label>
					<input required type="number" class="form-control" name="f4" min="0" max="100" step="0.01" value="<?= $result['attributes']['F4'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F5 (%)</label>
					<input required type="number" class="form-control" name="f5" min="0" max="100" step="0.01" value="<?= $result['attributes']['F5'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F6 (%)</label>
					<input required type="number" class="form-control" name="f6" min="0" max="100" step="0.01" value="<?= $result['attributes']['F6'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F7 (%)</label>
					<input required type="number" class="form-control" name="f7" min="0" max="100" step="0.01" value="<?= $result['attributes']['F7'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F8-15 (%)</label>
					<input required type="number" class="form-control" name="f8" min="0" max="100" step="0.01" value="<?= $result['attributes']['F8'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">F16-20 (%)</label>
					<input required type="number" class="form-control" name="f16" min="0" max="100" step="0.01" value="<?= $result['attributes']['F16'] ?>">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>

</div>
<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection