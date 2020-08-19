@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
	
		<h2>Danh sách ước muốn</h2>
		<ol>
			@foreach($uocmuon as $row) 
				<li>{!!$row->uocmuon_content!!}</li>
			@endforeach
			
		</ol>
	
	
		<form method="post" action="{{ url('/danguocmuon') }}" >
		 {{ csrf_field() }}
			<input class="form-control" name="uocmuon" />
			<br>
			<center><button type="submit">Đăng ước muốn</button></center>
		</form>
        
		
       </div> <!-- /col 12 -->     
@endsection