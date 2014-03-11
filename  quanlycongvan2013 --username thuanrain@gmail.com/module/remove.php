<?php
$upload_folder = '../uploads';
include("dbcon.php");

if(isset($_POST['filename'])) {
	
	$sql = "delete from file where url = '".$_POST['filename']."'";
	$tt = mysql_query($sql);
	 if( unlink($upload_folder.'/'.$_POST['filename'])) {
		
		
	 	echo 'File removed successfully.';
	}
	 else {
	 	echo 'Oooopsss... Something went wrong.';
	 }
	exit();
}
?>