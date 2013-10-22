<?php
 
$filename = $_GET['filename'];
 
// Modify this line to indicate the location of the files you want people to be able to download
// This path must not contain a trailing slash.  ie.  /temp/files/download
$download_path = "../uploads/";
  
 
// Combine the download path and the filename to create the full path to the file.
$file = "$download_path$filename";
 
// Test to ensure that the file exists.
if(!file_exists($file)) die("I'm sorry, the file doesn't seem to exist.");
 
// Extract the type of file which will be sent to the browser as a header
$type = filetype($file);
 
// Get a date and timestamp
$today = date("F j, Y, g:i a");
$time = time();
 
// Send file headers
header("Content-type: $type");
header("Content-Disposition: attachment;filename=$filename");
header("Content-Transfer-Encoding: binary");
header('Pragma: no-cache');
header('Expires: 0');
// Send the file contents.
set_time_limit(0);
readfile($file);
?>
<script type='text/javascript'>
     self.close();
</script>