
<footer>
	<div id="menu_mobile" class="row hidden-sm hidden-lg">
        <div class="col-xs-4"><a href="{{URL::to('/')}}">
      		<i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
        </div>
	    

	    <div class="col-xs-4"><a href="{{URL::to('/notice')}}">
	    	<i class="glyphicon glyphicon-bell" aria-hidden="true"></i><span>Notification</span></a>
	    </div>

	    <div id="toggle_menu_mobile" class="col-xs-4" ><a >
	    	<i class="fa fa-th" aria-hidden="true"></i><span>Extend</span></a>
	    		<ul class="sub_menu_mobile">
                      <li><a href="{{URL::to('/userinfo')}}">Information</a></li>
                      <li><a href="#">Story</a></li>
                      <li><a href="#">Develop</a></li>
                      <li><a href="{{URL::to('/setting')}}">Setting</a></li>
                      <li><a href="#">Change password</a></li>
                      <li><a href="#">Tutorial video</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                </ul>
	    </div>
	    </div>
</footer>
<script src="{!!url('public/js/js.js')!!}"></script>

</html>