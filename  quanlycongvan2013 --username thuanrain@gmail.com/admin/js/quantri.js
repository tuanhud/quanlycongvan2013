function capnhatquyen()
{
	var manv = $("#manv").val();
	var mydata = "";
	//alert(manv);
	/*$("input[type=checkbox]:checked").each(function() {
    mydata+= "(" + n + "," +  $(this).val() + ")," );
	});*/
	var n = $("#tongquyen").val();
	for(var i =0; i < n ; i++)
	{
		if($("#pq"+i).length>0)
			if(document.getElementById("pq"+i).checked)
				 mydata+= "(" + manv + "," +  $("#pq"+i).val() + ")," ;
	
	}
	if(mydata!="")
	{		
		mydata = "insert into chitietphanquyen(manhanvien,maquyen) values " + mydata;
		mydata = mydata.substr(0,mydata.length-1);
		mydata += ";";
		//alert(mydata);
		$.ajax({
			type: "POST",
			url: "./module/xulyphanquyen.php",
			data: "truyvan="+mydata+"&manv="+manv,
			async:false,
			success: function(result){$('#kqpq').html(result);}
		});
		return false;
	}
}
