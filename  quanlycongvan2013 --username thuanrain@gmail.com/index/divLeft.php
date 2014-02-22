 <div id="divLeft">
			</br>
        <div class="leftNav">
			<h3 class="headerbar">Tài khoản</h3>
			<ul>
			<form id="tutorial" action="xulydangnhap.php" method="post">

				<label>Tên đăng nhập</label></br>
				<input type="text" name="name" id="name" /><br>
				<label>Mật khẩu</label>
				<input type="password" name="email" id="email"/><br>
				<p class="submit"><input id="submit" type="submit" value="Đăng nhập" /></p>
			
			</form>
			</ul>
			</br>
			</br>
			</br>
			<h3 class="headerbar">Thông báo mới</h3>
			<ul>
            <?php   include('module/dbcon.php');
			?>
							
							<li><p><a class = "1" style=" cursor:pointer;" name = "2" onclick="showDT(this.name)"><b>Xét phụ cấp thâm niên nhà giáo 2014</b></a></p></li>
							<li><p><a style=" cursor:pointer;" name = "1" onclick="showDT(this.name)"> <b>Thông báo Nghỉ tết Nguyên đán 2014</b></a></p></li>
							<li><p><a style=" cursor:pointer;" name = "3" onclick="showDT(this.name)"><b>Thông báo Nghỉ Tết Dương Lịch 2014</b></a></p></li>
							<li><p><a style=" cursor:pointer;" name = "4" onclick="showDT(this.name)"><b>Thông báo giữ xe sau 18 giờ</b></a></p></li>
							
			</ul>
			</br>
			<h3 class="headerbar">Liên kết</h3>
			<ul>
				<li><a href="/"><b>Website Trường </b></a></li>
				<li><a href="/"><b>Website Ban Dữ liệu & CNTT</b></a></li>
				<li><a href="/"><b>Website phòng đào tạo</b></a></li>
				<li><a href="/"><b>Webmail</b></a></li>
			</ul>
		
		</div>

</div>