<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
	}
 include("dbcon.php");
?>
<?php include("module/qlphongban.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("head.php"); ?>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin, <a href="http://localhost/QuanLyCongVan/app/congvanden.php">Visit DMS site</a>| <a href="#" class="logout">Logout</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a  href="index.php">Trang chính</a></li>
                    <li><a href="list.html">Quản lý user</a>
                        <ul>
                        <li><a href="" title="">Phân quyền user</a></li>
                        <li><a href="" title="">Cập nhật thông tin</a></li>
                        </ul>
                    </li>
                    <li><a class="current" href="phongban.php">Quản lý phòng ban</a>
                        <ul>
                        <li><a href="" title="">Thêm phòng ban mới</a></li>
                        <li><a href="" title="">Cập nhật thông tin</a></li>\
                            
                        </ul>
                    </li>
                    <li><a href="congvan.php">Quản lý nhân viên</a>
                        <ul>
                        <li><a href="" title="">Thêm nhân viên mới</a></li>
                        <li><a href="" title="">Cập nhật thông tin</a></li>
						</ul>
                    </li>
                    <li><a href="congvan.php">Quản lý giao diện</a>
                        <ul>
                        <li><a href="" title="">Thiết lập menu</a></li>
                        <li><a href="" title="">Quản lý css</a></li>
                        </ul>
                    </li>
					<li><a href="congvan.php">Quản lý Công văn</a>
                    </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <form>
            <input type="text" name="" class="search_input" value="" onclick="this.value=''" />
            <input type="image" class="search_submit" src="images/search.png" />
            </form>            
            </div>
    
            <div class="sidebarmenu">
            
                <a class="menuitem submenuheader" href="">Liên kết nhanh</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Phân quyền user</a></li>
                    <li><a href="">Thiết lập menu</a></li>
                    <li><a href="">Quản lý user</a></li>
                    </ul>
                </div>
                    
            </div>
            
            
            
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>Chức năng chính</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Quản lý tài khoản</li>
                 <li>Quản lý nhân viên <strong>Phân quyền</strong> cho từng tài khoản.</li>
                  <li>Quản lý phòng ban </li>
                   <li>Quản lý giao diện</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
              
    
    </div>  
    
    <div class="right_content">            
        
    <h2>Quản lý phòng ban</h2> 
          <?php echo $out?>          
                    
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">DMS ADMIN PANEL | Powered by <a href="http://localhost/QuanLyCongVan/index.php">UIT DMS</a></div>
    	<div class="right_footer"><a href="http://localhost/QuanLyCongVan/index.php"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>