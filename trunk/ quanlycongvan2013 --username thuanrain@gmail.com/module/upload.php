<?php
$upload_folder = '../uploads';
include("dbcon.php");

if(isset($_POST['filename'])) {
	
	$context = stream_context_create(array('http' => array('header'=>'Connection: close')));
	$content = file_get_contents($_POST['file'], false, $context);
	$fileName = $_POST['filename'];
	$saved_file = $fileName;
	$ext = substr($fileName, strrpos($fileName, '.') + 1);
	$saved_file1 = str_replace( '.' . $ext, '', $fileName );
	/*$saved_file .= '_' . crypt($saved_file) . '.' . $ext;
	$saved_file = str_replace('/', '', $saved_file);
	*/
	$i = 1;
	
	while( @ file_exists($upload_folder.'/'.$saved_file) ) {
		 
	 $saved_file =	$saved_file1 .'_'.$i.'.'.$ext;
		$i++;
		 
		
	}
	
	
		 if(file_put_contents($upload_folder.'/'.$saved_file, $content, 0, $context)) {
		 $MaDK = mysql_query("select max(madk) from congvan");
		 $MaDangKy ;
		while ($row1 = mysql_fetch_array($MaDK))
		{
			$MaDangKy = $row1[0];
		}
		$sql = "insert into file(MaDK,url) values ('".$MaDangKy."','".$saved_file."')"; 
		$t = mysql_query($sql);
		if($t == true)
		{
			//echo "<script>confirm('Thêm Thành Công');</script>"; 
			echo $saved_file;
			
		}
		
	}
	
}
?>