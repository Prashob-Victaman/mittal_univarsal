<?php
define ("MAX_SIZE","20000"); 

 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
$msg = "";

$image=$_FILES['image']['name'];
	//if it is not empty
 	if ($image) 
 	{
 	$filename = stripslashes($_FILES['image']['name']);
 	$extension = getExtension($filename);
 	$extension = strtolower($extension);
 	 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		   //print error message
 			$msg .= 'Unknown extension!<br>';
 			$errors=1;
 		}
 		else
 		{

$size=filesize($_FILES['image']['tmp_name']);
if ($size > MAX_SIZE*1024)
{
	$msg .= 'You have exceeded the size limit!<br>';
	$errors=1;
}


$image_name=time().'.'.$extension;
$newname="upload_images/".$image_name;
move_uploaded_file($_FILES['image']['tmp_name'], $newname);
if (!$copied) 
{
	$msg .= 'Image Copying  Failed!<br>';
	$errors=1;
}}}

 if(!$errors) 
 {
 	
 } else print "Image upload error ( Maxsize allowed is : 20MB And Allowed Extensions are JPG,JPEG,PNG,GIF)<br><br>".$msg;
 ?>