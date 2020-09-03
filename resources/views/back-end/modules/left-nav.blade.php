<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col col-xs-2 col-sm-offset-0 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Tìm kiếm ...">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="{!!url('admin/home/')!!}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li ><a href="{!!url('admin/transactionmanager')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> TransactionManager</a>
			<ul class="nav submenu">
				<li><a href="{!!url('admin/transactionmanager/deposit')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Deposit</a></li>
				<li><a href="{!!url('admin/transactionmanager/withdraw')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Withdraw</a></li>
			</ul>
			</li>

			</ul>

	</div>
	<script>
		$(document).ready(function(){
			let path = window.location.href;
			$('.nav li a').each(function() {
				if (this.href === path) {
					$(this).addClass('active');
				}else{
					$(this).removeClass('active')
				}
				
			})
		});
		
		</script><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->