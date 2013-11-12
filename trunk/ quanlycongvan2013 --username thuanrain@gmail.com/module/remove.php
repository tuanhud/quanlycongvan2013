<?php
$upload_folder = '../uploads';


if(isset($_POST['filename'])) {

	 if( unlink($upload_folder.'/'.$_POST['filename']) ) {
	 	echo 'File removed successfully.';
	}
	 else {
	 	echo 'Oooopsss... Something went wrong.';
	 }
	exit();
}
?>