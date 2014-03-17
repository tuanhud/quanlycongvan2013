function capnhatquyen()
{
	alert("asdasdasdas");
	var n = $("#manv").val();
	var mydata = "";
	$("input[type=checkbox]:checked").each(function() {
    mydata+= "(" + n + "," +  $(this).val() + ")," );
	});
	if(mydata!="")
	{		
		mydata = "insert into chitietphanquyen(manhanvien,maquyen) values " + mydata;
		mydata = mydata.substr(0,mydata.length-1);
		mydata += ";";
		alert(mydata);
		$.ajax({
			type: "POST",
			url: "module/xulyphanquyen.php",
			data: "truyvan="+mydata,"manv="+n,
			async:false,
			success: function(result){$('#kqpq').html(result);}
		});
		return false;
	}
}
