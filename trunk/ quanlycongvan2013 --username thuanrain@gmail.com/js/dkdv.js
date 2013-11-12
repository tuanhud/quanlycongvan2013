$(document).ready(function(){
	$("#form_buoc1").submit(function(){
		var dv = $("input[name='dv']:checked").val();	
		alert("Test");
		$.ajax({
				type: "POST",
				url: "./libs/dkdv_step2.php",
				data: "dv="+ dv,
				async:false,
				success: function(result){$('#dkdv').html(result);}
			});
			////////////////////////////////////////
			$('select[id^="ct"]').change(function(){
				var mact = $(this).val();
				var sttct = $(this).attr("id").substr(2,1);
				var idthediv = "#chongame"+sttct;
				$.ajax({
					type: "POST",
					url: "./libs/laymagame.php",
					data: "mact="+ mact+"&sttct="+sttct,
					async:false,
					success: function(result){$("#chongame"+sttct).html(result);}
				});
			//////////////////////////////////////////////////	
			$('select[id^="game"]').change(function(){
				var magame = $(this).val();
				var sttgame = $(this).attr("id").substr(4,1);
				$.ajax({
					type: "POST",
					url: "./libs/laymasv.php",
					data: "magame="+ magame+"&sttgame="+sttgame,
					async:false,
					success: function(result){$('#chonsv'+sttgame).html(result);}
				});
				return false;
			});
				return false;
			});	
			//////////////////////////////////
			$("#form_buoc2").submit(function(){
				
				var ghichu	= $("#ghichu").val();
				var mk		= $("#password").val();
				var cmk		= $("#cpassword").val();
				var er = "Cảnh báo : ";
				var mydata = "";
				if ($("#sv").length)
				{
					var sv 		= $("#sv").val();
					if(sv==null)
						er+=" chưa chọn sv ,";
					mydata +="sv="+sv+"&";
				}
				if(mk.length<6)
					er+=" mật khẩu phải có ít nhất 6 ký tự ,";
				else if(mk!=cmk)
					er+=" mật khẩu nhập lại không đúng ,";
				else mydata += "mk="+mk +"&ghichu="+ghichu;
				er = er.substring(0,er.length-2);
				if(er=="Cảnh báo ")
					{
						$.ajax({
							type: "POST",
							url: "./libs/dkdv_step3.php",
							data: mydata,
							async:false,
							success: function(result){$('#dkdv').html(result);}
						});
					}
					else $("#error").html(er);
				return false;
				});
	return false;
	});
});

function hienthivp(stt,magd,loaigd,kh)
{
	$.ajax({
						type: "POST",
						url: "./libs/hienthichitiet.php",
						data: "stt="+stt+"&magd="+magd+"&loaigd="+loaigd+"&kh="+kh,
						async:false,
						success: function(result){$('#hienthigd').html(result);}
					});
	return false;
}

function tgdv_step2()
{
	var magd = $("#tgdv_magd").val();
	var mkgd = $("#tgdv_mkgd").val();
		$.ajax({
			type: "POST",
			url: "./libs/tgdv_step2.php",
			data : "magd="+magd+"&mkgd="+mkgd,
			async:false,
			success:function(result){$('#tgdv').html(result);}
		});
	return false;
}

function tgdv_step3(magd)
{
		$.ajax({
			type: "POST",
			url: "./libs/tgdv_step3.php",
			data : "magd="+magd,
			async:false,
			success:function(result){$('#tgdv').html(result);}
		});
	return false;
}

function tgdv_step4()
{
	$.ajax({
			type: "GET",
			url: "./libs/tgdv_step4.php",
			async:false,
			success:function(result){$('#tgdv').html(result);}
		});
	return false;
}

function laymagame()
{
	var mact = $("#ct").val();
	var sttct = "-1";
	$.ajax({
		type: "POST",
		url: "./libs/laymagame.php",
		data: "mact="+ mact+"&sttct="+sttct,
		async:false,
		success: function(result){$("#chongame").html(result);}
		});
	return false;
}

function laymasv()
{
	var magame = $("#game").val();
	var sttgame = "-1";
	$.ajax({
		type: "POST",
		url: "./libs/laymasv.php",
		data: "magame="+ magame+"&sttgame="+sttgame,
		async:false,
		success: function(result){$('#chonsv').html(result);}
	});
	return false;
}

function kqtk()
{
	var mydata = '';
	var vaitro = $("#vaitro").val();
	mydata+="vaitro=" + vaitro;
	var loaigd = $("#loaigd").val();
	mydata+="&loaigd="+loaigd;
	if ($("#ct").length)
	{
		var ct 		= $("#ct").val();
		mydata+="&ct="+ct;
	}
	if ($("#game").length)
	{
		var game 		= $("#game").val();
		mydata+="&game="+game;
	}
	if ($("#sv").length)
	{
		var sv 		= $("#sv").val();
		mydata+="&sv="+sv;
	}
	var ngay1= $("#ngay1").val();
	mydata+="&ngay1="+ngay1;
	var ngay2 =$("#ngay2").val();
	mydata+="&ngay2="+ngay2;
	var ghichu = $("#ghichu").val();
	mydata+="&ghichu="+ghichu;
	$.ajax({
		type : "POST",
		url  : "./libs/kqtk.php",
		data : mydata,
		async:false,
		success: function(result){$('#kqtk').html(result);}
	});
	return false;
}

function chitietkh(makh)
{
	alert(makh);
}