<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../localization/messages_vi.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#doimk").validate({
				errorElement: "span", //Thành phần HTML hiện thông báo lỗi
				//Sử dụng tùy chọn rules cho những validate không hỗ trợ bởi class name
				rules: {
					cpassword: {
						equalTo: "#password" //So sánh với trường cpassword với thành trường có id là password
					},
					min_field: { min: 5 }, //Giá trị tối thiểu
					max_field: { max : 10 }, //Giá trị tối đa
					range_field: { range: [4,10] }, //Giá trị trong khoảng từ 4 - 10
					rangelength_field: { rangelength: [4,10] } //Chiều dài chuỗi trong khoảng từ 4 - 10 ký tự
				}
			});
		});
	</script>
<script language="javascript" type="text/javascript" src="../js/thickbox1.js"></script>

</head>
<body>
<div id="doimatkhau_css">
<form id="doimk" action="../module/xulydoimk.php" method="post">
<table class = "thichbox">
		<tr>
		<td >Mật khẩu cũ : </td>
		<td ><input  type="password" class="required" class="Text" minlength="6" maxlength="20" id="mkcu" name="mkcu"></td>
		<td style="padding-left:10px; color:red"><span class="rq"> * </span> </td>
		</tr>
				<tr height="10px"></tr>
		<tr>
		<td >Mật khẩu mới : </td>
		<td ><input name="password" class="required" class="Text" minlength="6"  type="password" maxlength="20" id="password"></td>
		<td style="padding-left:10px; color:red;"> <span class="rq"> * </span> </td>
		</tr>
				<tr height="10px"></tr>
		<tr>
		<td >Nhập lại mật khẩu : </td>
		<td ><input name="cpassword"class="required" class="Text" minlength="6" type="password" maxlength="20" id ="cpassword"></td>
		<td style="padding-left:10px; color:red;"><span class="rq"> * </span> </td>
		</tr>
				<tr height="10px"></tr>
		<tr>
		<td ></td>
		<td ><input type="submit" id="bt_doimk" value="Thực hiện" /></td>
		</tr>
</table>
</form>
</div>
</body>
</html>