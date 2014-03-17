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
function quyenthuky()
{
	var n = $("#tongquyen").val();
	for(var i = 0; i < n ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=false
	}
	for(var i = 0; i < 11 ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=true
	}
	document.getElementById("pq19").checked=true;
	document.getElementById("pq20").checked=true;
	return false;
}
function quyentruongphong()
{
	var n = $("#tongquyen").val();
	for(var i = 0; i < n ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=false
	}
	for(var i = 0; i < 11 ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=true
	}
	for(var i = 19; i < 25 ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=true
	}
	return false;
}
function toanquyen()
{
	var n = $("#tongquyen").val();
	for(var i = 0; i < n ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=true
	}
	return false;
}
function bochon()
{
	var n = $("#tongquyen").val();
	for(var i = 0; i < n ; i++)
	{
		if($("#pq"+i).length>0)
				document.getElementById("pq"+i).checked=false
	}
	return false;
}

function themuser()
{
						var tendn	= $('#tendn').val();
						var mk	= $('#mk').val();
						var nlmk	= $('#nlmk').val();
						var quyen	= $("input[name='quyen']:checked").val();
						var manv	= $('#input1').val();
						$.ajax({
							type: "POST",
							url: "./module/xulythemuser.php",
							data: "tendn="+tendn+"&mk="+mk
									+"&nlmk="+nlmk+"&quyen="+quyen+"&manv="+manv,
							async:false,
							success: function(kqthemuser){$('#kqthemuser').html(kqthemuser);}
						});
						return false;
}



