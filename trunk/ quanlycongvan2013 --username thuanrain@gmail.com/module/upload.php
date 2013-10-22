<?php
$upload_folder = '../uploads';


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
	$fileName = $saved_file;
		 if(file_put_contents($upload_folder.'/'.$saved_file, $content, 0, $context)) {
	 
		echo $saved_file;
	}
	exit();
}
?>