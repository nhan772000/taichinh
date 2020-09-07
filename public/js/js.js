function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}



$(document).ready(function(){
         
    $('[data-toggle="popover"]').popover();  

//xử lý khi đóng mở menu, thông báo, ngôn ngữ
    $(".icon_menu").click(function(){
  		$(".menu-right").toggleClass("menu-right_show");
        $(".language_desktop").removeClass("menu-right_show");
        $(".menu_thongbao").removeClass("menu-right_show");
});
    $(".icon_language").click(function(){
        $(".language_desktop").toggleClass("menu-right_show");
        $(".menu-right").removeClass("menu-right_show");
        $(".menu_thongbao").removeClass("menu-right_show");
});
    $(".icon_thongbao").click(function(){
        $(".menu_thongbao").toggleClass("menu-right_show");
        $(".menu-right").removeClass("menu-right_show");
        $(".language_desktop").removeClass("menu-right_show");
});
    $('.body').click(function() {
        $(".menu-right").removeClass("menu-right_show");
        $(".language_desktop").removeClass("menu-right_show");
        $(".menu_thongbao").removeClass("menu-right_show");
    });

//xử lý ẩn và hiển thị mật khẩu
    $(".showhidepwd").click(function() {
    var $pwd = $("#user_password");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
        $(".showhidepwd").empty();
    	$(".showhidepwd").append('<i class="glyphicon glyphicon-eye-close"></i>');
    } else {
        $pwd.attr('type', 'password');
        $(".showhidepwd").empty();
    	$(".showhidepwd").append('<i class="glyphicon glyphicon-eye-open"></i>');
    }

    	



    });

    //xử lý ẩn và hiển thị mật khẩu thanh toán
    $(".showhidepwdtt").click(function() {
    var $pwd = $("#user_password_pay");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
        $(".showhidepwdtt").empty();
    	$(".showhidepwdtt").append('<i class="glyphicon glyphicon-eye-close"></i>');
    } else {
        $pwd.attr('type', 'password');
        $(".showhidepwdtt").empty();
    	$(".showhidepwdtt").append('<i class="glyphicon glyphicon-eye-open"></i>');
    }
    });

    //xử lý khi click vào thông báo
    $("#clear_thongbao").click(function() {
    	//$("#thongbao").empty();
    	$("#thongbao").text("");
    });

    // xử lý cho nạp khi chọn loại nạp
    $("#chonloainap").change(function() {
		var vnd= '<div class="alert alert-warning vivify popInTop"><p>Bạn muốn chuyển tiền vào STK dưới đây và gửi chứng từ chuyển tiền để xác nhận</p><p>Ngân hàng: Vietcombank</p><p>Tên: Nguyen Van A</p><p>STK: 1551120126</p><p>Chi nhánh: Gò Vấp</p><p>Nội dung chuyển</p><p>Nạp vào [ID] [Số điểm]</p></div>';
		var USDT= '<div class="alert alert-warning vivify popInTop"><p>hiện ra khi chọn USDT</p></div>';
		var layval = $("#chonloainap option:selected").val();

		if(layval == 1){
			$("#select_VND_or_USDT").html(vnd);
		}
		else if(layval == 2){
			$("#select_VND_or_USDT").html(USDT);
		}
		else {
			$("#select_VND_or_USDT").text("");
		}
	});
	// xử lý cho nạp khi chọn loại rút
    $("#chonloairut").change(function() {
		var vnd= '<div class="alert alert-warning vivify popInTop"><p>Tên ngân hàng: Vietcombank</p> <p>Tên chủ thể: Nguyen Van A</p> <p>STK: 1551120126 </p></div>';
		var USDT= '<div class="alert alert-warning vivify popInTop"><p>hiện ra khi chọn USDT</p></div>';
		var layval = $("#chonloairut option:selected").val();

		if(layval == 1){
			$("#select_VND_or_USDT").html(vnd);
		}
		else if(layval == 2){
			$("#select_VND_or_USDT").html(USDT);
		}
		else {
			$("#select_VND_or_USDT").text("");
		}
	});

	//xử lý khi nhập điểm vào
	$("#point_chuyen").change(function(){
		var point = $("#point_chuyen").val();
		if($.isNumeric(point))
		{
				if(point > 50 )
			{
				point = point * 1000;
				point = formatNumber(point);
				var text = '<p class="alert alert-warning vivify popInTop">Bạn cần chuyển '+ point +' VND</p>';
			$("#thongbaosotien").html(text);
			}
			else{
				$("#thongbaosotien").html('<p class="alert alert-danger vivify popInTop">Số điểm bạn nhập không hợp lệ !!</p>');
			}popInTop
		}
		else{
			$("#thongbaosotien").html('<p class="alert alert-danger vivify popInTop">Số điểm bạn nhập không hợp lệ !!</p>') 
		}
		
		
		
	});
    $("#accept").change(function() {
        if($(this).is(":checked")){
            $("#register").removeAttr('disabled');
        }
        else{
            $("#register").attr('disabled', 'disabled');
        }
    });





});



