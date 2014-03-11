<?php
$daxl = 0;
	$khan = 0;
	$tongg = 0;
	$khan = 0;
	$mat = 0;
	$ds = 0;
	$nhan = 0;
	$choxl=0;
	$manv = $_SESSION['manv'];
	$user = $_SESSION['myname'];
			
	$sqlleft = "select distinct congvan.madk,congvan.dokhan,trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."' and congvan.active = 1";
	$query = mysql_query($sqlleft);
	while ($rowx = mysql_fetch_array($query))
	{
		$tongg++;
		if($rowx[trangthai] == 2)
		{
			$daxl++;
		}
		else
		$choxl++;
		
	}
	$sqlnhan = "select madk from chitietnhan where manv = '".$manv."' and trangthai = 0";
	$querynhan = mysql_query($sqlnhan);
	while ($rowxx = mysql_fetch_array($querynhan))
	{
		$nhan++;	
	}
	
?>
<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
			
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $user ?></strong></a>
					<ul>
						<li><?php echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'My Profile','thongtincanhan.php?KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Thông Tin Cá Nhân' > "; ?>My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><?php echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Đổi mật khẩu','doimk.php?KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Đổi mật khẩu' > "; ?>Change Password</a></li>
						<li><a href="../module/logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" onclick = "phanloaileft(1);" class="round button dark menu-email-special1 image-left"><?php echo $choxl; ?> Công văn chờ xử lý </a></li>
<?php
if($nhan == 0)
{
	echo '<li><a href="congvannhan.php" class="round button dark menu-email-special image-left"> Hộp thư đến </a></li>';
}
else
	echo '<li><a href="congvannhan.php" class="round button dark menu-email-special2 image-left"> Hộp thư đến <font color = "yellow">('.$nhan.')  </font> </a></li>';
?>				
								
				<li><a href="../module/logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="timkiem.php" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="keyword" name = "keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->