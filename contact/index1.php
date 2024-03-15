<?php
include("../../../mittal_universal/admin/config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mittal Universal</title>
<link href="../../../mittal_universal/css/style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../../../mittal_universal/css/style_dropdown.css" type="text/css" media="screen, projection"/>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
    
<script type="text/javascript">
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

<link rel="stylesheet" href="../../../mittal_universal/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../../../mittal_universal/theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="../../../mittal_universal/js/slide-fade-content.js"></script>
    <script type="text/javascript" src="../../../mittal_universal/js/jquery-1.3.1.min.js"></script>	
	<script type="text/javascript" language="javascript" src="../../../mittal_universal/js/jquery.dropdownPlain.js"></script>
        
		<!--<script type="text/javascript" src="js/jquery.easing.min.js"></script>-->
		
		<script type="text/javascript" src="../../../mittal_universal/js/supersized.3.2.6.js"></script>
		<script type="text/javascript" src="../../../mittal_universal/theme/supersized.shutter.min.js"></script>
		
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	1,			// Slideshow starts playing automatically
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   5000,		// Length between transitions
					transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	500,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	[			// Slideshow Images
														{image : 'images/img1.jpg', title : '<div id="my_caption" class="my_caption">We are the most innovative provider of real estate services in India. Our deep commitment to community, our reputation of integrity and trust, our visionary culture makes us the real estate company of choice.</div>', thumb : '', url : ''},
														{image : 'images/img2.jpg', title : '<div id="my_caption" class="my_caption">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s</div>', thumb : '', url : ''},
														
														{image : 'images/img3.jpg', title : '<div id="my_caption" class="my_caption">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</div>', thumb : '', url : ''}
														
												],
												
					// Theme Options			   
					progress_bar			:	1,			// Timer for each slide							
					mouse_scrub				:	0
					
				});
		    });
		    
		</script>
        
        <style type="text/css">
		ul#demo-block{ margin:0 15px 15px 15px; }
			ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('../../../mittal_universal/img/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
			ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>
    <script>
    $(document).ready(function(){
var inner = $('#slidecaption'),
    ht = inner.height();

inner.css({'position':'absolute','top':'44%','margin':-ht/2+'px 0 0 0'});
});

    </script>
<script language="Javascript">

<!--

function toggleDiv(id,flagit) {

if (flagit=="1"){
	
if (document.layers) document.layers[''+id+''].visibility = "show";

else if (document.all) document.all[''+id+''].style.visibility = "visible"

else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "visible"

}

else

if (flagit=="0"){

if (document.layers) document.layers[''+id+''].visibility = "hide"

else if (document.all) document.all[''+id+''].style.visibility = "hidden"

else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "hidden"

}

}

//-->

</script>
<script>
function a1() {
MM_swapImage('Image15','','../../../mittal_universal/images/overview2.jpg',1);
MM_swapImage('Image7','','../../../mittal_universal/images/about2.jpg',1)
}

function b1() {
MM_swapImage('Image15','','../../../mittal_universal/images/overview1.jpg',1);
MM_swapImage('Image7','','../../../mittal_universal/images/about1.jpg',1)
}

function a2() {
MM_swapImage('Image16','','../../../mittal_universal/images/vandm2.jpg',1);
MM_swapImage('Image7','','../../../mittal_universal/images/about2.jpg',1)
}

function b2() {
MM_swapImage('Image16','','../../../mittal_universal/images/vandm1.jpg',1);
MM_swapImage('Image7','','../../../mittal_universal/images/about1.jpg',1)
}

function a3() {
MM_swapImage('Image18','','../../../mittal_universal/images/history2.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about2.jpg',1)
}

function b3() {
MM_swapImage('Image18','','../../../mittal_universal/images/history1.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about1.jpg',1)
}

function a4() {
MM_swapImage('Image20','','../../../mittal_universal/images/brand2.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about2.jpg',1)
}

function b4() {
MM_swapImage('Image20','','../../../mittal_universal/images/brand1.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about1.jpg',1)
}

function a5() {
MM_swapImage('Image22','','../../../mittal_universal/images/social2.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about2.jpg',1)
}

function b5() {
MM_swapImage('Image22','','../../../mittal_universal/images/social1.jpg',1)
MM_swapImage('Image7','','../../../mittal_universal/images/about1.jpg',1)
}
</script>
<script type="text/javascript" src="../../../mittal_universal/js/load.js"></script>
<style type="text/css">
			#ajax { width: 100%; height:100%; }
			#loader { width: 100%; height:100%; text-align:center; border: 0 none; margin:0 auto 0; padding:24% 0 0 0; }
		</style>
<script>
    $(document).ready(function(){
var inner = $('#d_contact_box'),
    ht = inner.height();

inner.css({'position':'absolute','top':'50%','margin':-ht/2+'px 0 0 0'});

var inner = $('#d_contact_box2'),
    bt = inner.height();

inner.css({'position':'absolute','top':'50%','margin':-bt/2+'px 0 0 0'});


});

    </script>


<script type="text/javascript" src="../../../mittal_universal/js/script.js"></script>
</head>

<body onLoad="MM_preloadImages('../../../mittal_universal/images/fb2.jpg','../../../mittal_universal/images/tw2.jpg','../../../mittal_universal/images/email2.jpg','../../../mittal_universal/images/home2.jpg','../../../mittal_universal/images/about2.jpg','../../../mittal_universal/images/projects2.jpg','../../../mittal_universal/images/past_projects2.jpg','../../../mittal_universal/images/contact2.jpg','../../../mittal_universal/images/overview2.jpg','../../../mittal_universal/images/vandm2.jpg','../../../mittal_universal/images/history2.jpg','../../../mittal_universal/images/brand2.jpg','../../../mittal_universal/images/social2.jpg','../../../mittal_universal/images/commercial2.jpg','../../../mittal_universal/images/residential2.jpg','../../../mittal_universal/images/hospitality2.jpg','../../../mittal_universal/images/township2.jpg')">
<div id="ajax">
<div id="wrap">
<div id="main">
<div id="logo"> <a href="#"><img src="../../../mittal_universal/images/logo.png" width="263" height="96" style="padding:20px 0 0 20px"></a> </div>
<div id="menu_my">



        <ul class="dropdown">
        	<li><a href="#">HOME</a></li>
        	<li><a href="#">ABOUT</a></li>
        	<li><a href="#">PROJECTS</a>
        		<ul class="sub_menu">
        			 <?php
					 $i=0;
					 $cityid="";
					 $citydist=mysql_query("select distinct(city_id) from project WHERE city_id IS NOT NULL");
					 $i=0;
					 while($row=mysql_fetch_assoc($citydist))
					 {
					   if($i>0)
					   {
					     if(!empty($row['city_id']))
						 {
					      $cityid.=","; 
					     }
					   }
					   if(!empty($row['city_id']))
					   {
					    $cityid.=$row['city_id'];
					   }
					   $i++;	 
					 }
					 
					 $cityquery=mysql_query("select * from city where city_id in (".trim($cityid).") order by lstOrder"); 
					 while($rw=mysql_fetch_assoc($cityquery))
					 {
					 ?>
                     <li><a href="#"><?=strtoupper($rw['city_name']);?></a>
                     <ul>
        					<?php
							$projectquery=mysql_query("select distinct(cat) from project where city_id=".$rw['city_id']);
							while($rw1=mysql_fetch_assoc($projectquery))
							{
							?>
                            <li><a href="project/<?=trim(strtolower($rw1['cat']))?>/index.php?id=<?=$rw['city_id']?>"><?=strtoupper($rw1['cat'])?></a></li>
        		            <?php
							}
							?>
                     </ul>
        			 </li>
                     <?php
					 }
                     ?>
        	   </ul>
        	</li>
        	<li><a href="#">PAST PROJECTS</a></li>
        	<li><a href="#">SOCIAL ACTIVITIES</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
		

    
    

</div>



<div id="clear"></div>
<div id="middle">
<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
    
    <div id="slidecaption">  </div>
    
   </div> 
<div id="footer">
<div id="footer_link" class="footer_link"><a href="#">Site Map</a>&nbsp; | &nbsp;<a href="#">Legal Disclamer</a><br>
COPYRIGHT © 2012. ALL RIGHTS RESERVED.&nbsp; | &nbsp;Designed by <a href="http://www.skarma.com/" target="_blank">skarma.com</a></div>
<div id="footer_icon">
<div id="fb"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','../../../mittal_universal/images/fb2.png',1)"><img src="../../../mittal_universal/images/fb1.png" name="Image2" width="26" height="26" id="Image2"></a></div><div id="foot_devide" style="margin:0 2px 0 2px;"><img src="../../../mittal_universal/images/footer_devide.png" width="2" height="26"></div>
<div id="fb"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','../../../mittal_universal/images/tw2.png',1)"><img src="../../../mittal_universal/images/tw1.png" name="Image3" width="26" height="26" id="Image3"></a></div><div id="foot_devide" style="margin:0 6px 0 2px;"><img src="../../../mittal_universal/images/footer_devide.png" width="2" height="26"></div>
<div id="fb"><a href="#" onMouseOut="MM_swapImgRestore()" onMouse0Over="MM_swapImage('Image4','','../../../mittal_universal/images/email2.png',1)"><img src="../../../mittal_universal/images/email1.png" name="Image4" width="26" height="26" id="Image4"></a></div>
</div>

</div>

</div>

</div>
</div>
<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu3","menuhover");
</script>
</body>
</html>
