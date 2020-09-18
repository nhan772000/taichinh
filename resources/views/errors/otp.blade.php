<form action="{{URL::to('/otp')}}" method="post">
{{ csrf_field() }}
	<input type="text" name="sdt">
	<input type="submit" value="gửi">
</form>