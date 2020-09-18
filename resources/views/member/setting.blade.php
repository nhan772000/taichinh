@extends('layouts.master')
@section('content')

<body>

	<div class="container body">

		<div id="mevivu_signup" class="container">
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-lg-8 col-lg-offset-2 ">
			      <div class="well well-sm">
					<form action="{{URL::to('/setting')}}" method="post" enctype="multipart/form-data">
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
				                                                    
		                    <h3 class="text-center">Setting Cashback</h3>
				          	
				          	<div style="margin-top: 50px; display: flex; justify-content: space-around;">

						      <label class="radio-inline" ><input  type="radio" value="0" name="user_type_cashback" <?php if($type_setting == 0) echo 'checked';?>>Cashback 30% Eco Wallet</label>
				

						      <label class="radio-inline"><input type="radio" <?php if($type_setting == 1) echo 'checked';?> value="1" name="user_type_cashback">Cashback 5% Ext Wallet</label>
					
						    </div>

				          <button style="margin-top: 50px;" type="submit" class="btn btn-default btn-block" name="update_setting">Update Typer Cashback</button>
				         
				        </form>
				    </div>
				</div>
			</div>

		</div>
	</div>
</body>

@endsection