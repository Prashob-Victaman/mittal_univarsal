<?php
include('config.php');
error_reporting(-1);


	
	function path(){
	
		$url=$_SERVER["REQUEST_URI"];
		
		
		$arr=explode("/",$url);
		$length=sizeof($arr);
		$path="";
		for($i=0 ; $i<$length-1;$i++){
              $path .=$arr[$i]."/";
		}
		
		return $path;
	
	}
	

if(isset($_POST['req'])){

	if($_POST['req']=='delete_image'){
	
		$pid=$_POST['pid'];
		$floor_plan=$_POST['floor'];
		$image=$_POST['image'];
		//$img_dir='upload_images/';
		$ab_path = path();
		if($floor_plan!='brochure'){
			$file=$_SERVER['DOCUMENT_ROOT'].$ab_path.$img_dir.$image;
		
		}else{
			$file=$_SERVER['DOCUMENT_ROOT'].$ab_path.$pdf_dir.$image;
		}
		if(file_exists($file)){
			unlink($file);
			$sql="update project SET ".$floor_plan."='no-image' where pid=".$pid;
			$result = mysql_query($sql);
			echo "delete";
			
		}else{
			
			echo $file;
		
		}
		
		
	
	}


}

?>