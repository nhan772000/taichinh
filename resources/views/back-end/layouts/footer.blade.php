<script src="{!!url('public/back-end/js/jquery-1.11.1.min.js')!!}"></script>
<script src="{!!url('public/back-end/js/bootstrap.min.js')!!}"></script>
<script src="{!!url('public/back-end/js/chart.min.js')!!}"></script>
<script src="{!!url('public/back-end/js/chart-data.js')!!}"></script>
<script src="{!!url('public/back-end/js/easypiechart.js')!!}"></script>
<script src="{!!url('public/back-end/js/easypiechart-data.js')!!}"></script>
<script src="{!!url('public/back-end/js/bootstrap-datepicker.js')!!}"></script>
<script src="{!!url('public/css/mevivu.min.css')!!}"></script>
<script type='text/javascript' src='{!!url(' public/js/script.js')!!}'> </script> <script>
	$('#calendar').datepicker({});

	! function($) {
		$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
			$(this).find('em:first').toggleClass("glyphicon-minus");
		});
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function() {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function() {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
	$(document).ready(function() {
		$("#sel1").change(function() {
					var vnd = '<div class="alert alert-warning vivify popInTop"><p>Bạn muốn chuyển tiền vào STK dưới đây và gửi chứng từ chuyển tiền để xác nhận</p><p>Ngân hàng: Vietcombank</p><p>Tên: Nguyen Van A</p><p>STK: 1551120126</p><p>Chi nhánh: Gò Vấp</p><p>Nội dung chuyển</p><p>Nạp vào [ID] [Số điểm]</p></div>';
					var USDT = '<div class="alert alert-warning vivify popInTop"><p>hiện ra khi chọn USDT</p></div>';
					var layval = $("#sel1 option:selected").val();

					if(layval == 1)
					{
						$('#VTK').text('9');
					}
					else if(layval ==2)
					{
						$('#VTK').text('8');
					}
					else if(layval ==3)
					{
						$('#VTK').text('7');
					}
					else if(layval ==4)
					{
						$('#VTK').text('6');
					}
					else if(layval ==5)
					{
						$('#VTK').text('5');
					}
					else if(layval ==6)
					{
						$('#VTK').text('4');
					}
					else if(layval ==7)
					{
						$('#VTK').text('3');
					}
					else if(layval ==8)
					{
						$('#VTK').text('2');
					}
					else if(layval ==9)
					{
						$('#VTK').text('1');
					}
		});
	});
</script>
</body>

</html>