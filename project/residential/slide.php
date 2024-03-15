<?php
include("../../admin/config.php"); 
if(isset($_REQUEST['pid']) && $_REQUEST['pid']!='')
{
	$pid = $_REQUEST['pid'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<!--
		Supersized - Fullscreen Slideshow jQuery Plugin
		Version : 3.2.6
		Site	: www.buildinternet.com/project/supersized
		
		Author	: Sam Dunn
		Company : One Mighty Roar (www.onemightyroar.com)
		License : MIT License / GPL License
	-->

	<head>

		<title>Mittal Universal</title>
		
		
		<link rel="stylesheet" href="css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="js/supersized.3.2.6.min.js"></script>
		<script type="text/javascript" src="theme/supersized.shutter.min.js"></script>
		
		<script type="text/javascript">
jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   3000,		// Length between transitions
					transition              :   3, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	700,		// Speed of transition
					
					
					// Size & Position						   
					min_width		        :   1,			// Min width allowed (in pixels)
					min_height		        :   1,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	1,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
					
					
														   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
					
		  <?php
	        $q_img = mysql_query("select * from image where pid = $pid order by image_id");	
			$num = mysql_num_rows($q_img);
			$i=1;
			while($rw_img = mysql_fetch_array($q_img))
			{
				$image = "../../admin/upload_images/".$rw_img['image'];
		?>	
						{image : '<?=$image;?>', title : '', thumb : '', url : ''}
						<?php if($num > $i) echo ',';?>
		<?php
				$i++;
			}
		?>							
														
												],
					
				});
		    });
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
        </script>
		
	</head>
	
	<style type="text/css">
		ul#demo-block{ margin:0 15px 15px 15px; }
			ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:right; clear:both; color:#aaa; font:11px Helvetica, Arial, sans-serif; }
			ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>

<body>

	<!--Demo styles (you can delete this block)-->
	
	<ul id="demo-block">
		<li><a href="index.php?id=<?=$_REQUEST['id']?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','img/small_screen_1.png',0)"><img src="img/small_screen.png" name="Image2" width="40" height="26" id="Image2" /></a></li>
	</ul>
	
	<!--End of styles-->

	<!--Thumbnail Navigation-->
<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item" style="display:none;"></a>
	
	<div id="thumb-tray" >
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Control Bar-->
    
	<div id="controls-wrapper" class="load-item">
	<a id="play-button"><img id="pauseplay" src="img/pause.png"/></a>	
    <!--Thumb Tray button-->
	<a id="tray-button"><img id="tray-arrow" src="img/button-tray-up.png"/></a>
			
			
			
		
	</div>

</body>
</html>
