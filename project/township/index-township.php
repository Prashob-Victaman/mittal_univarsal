<?php
include("../../admin/config.php"); 
?>
<!doctype html>
<html>
<head>
<title>Mittal Universal</title>
<link href='../../images/favicon.ico' rel='icon' type="image/x-icon" />
<link href='../../images/favicon.ico' rel='shortcut icon' type="image/x-icon" />
<link href="../../css/style.css" rel="stylesheet" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../../css/style_dropdown.css" type="text/css" media="screen, projection"/>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="../../css/ie.css" media="screen" />
    <![endif]-->

<link rel="stylesheet" href="../../css/supersized.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../../theme/supersized.shutter.css" type="text/css" media="screen" />
		
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        
        <script type="text/javascript" src="../../js/slide-fade-content.js"></script>
    <!--script type="text/javascript" src="../../js/jquery-1.3.1.min.js"></script-->	
	<!--script type="text/javascript" language="javascript" src="../js/jquery.dropdownPlain.js"></script-->
        
		<!--<script type="text/javascript" src="../../js/jquery.easing.min.js"></script>-->
		 <script type="text/javascript" src="../../js/script.js"></script>
         <style>

body {
	height:100%;
	width:100%;
	margin:0;padding:0;
}

html {
	overflow:hidden;
	}


#wrapper {
	width:100%;
	height:352px;
	top:0;
	left:0;
	overflow:hidden;
	position:absolute;
}

	#mask {
		width:500%;
		height:352px;
	}

	.item {
		width:20%;
		height:352px;
		float:left;
	}
	
	
	.content {
		width:100%;
		height:292px;
		margin:0 auto 0;
		position:relative;
		padding:30px 0 30px 0;
	background:url(../../images/contact_bg.png);
	}
	
	.selected {
		font-weight:700;
	}

	.clear {
		clear:both;
	}

</style>

     
<script>
function uc() {
	$("#upcoming1").css("display","none");
	$("#upcoming2").css("display","block");
	$("#upcoming_sub").css("display","block");
	$("#ongoing1").css("display","block");
	$("#ongoing2").css("display","none");
	$("#ongoing_sub").css("display","none");
	$("#complete1").css("display","block");
	$("#complete2").css("display","none");
	$("#complete_sub").css("display","none");
	$("#big_box_right").css("visibility","visible");
	$("#big_box_right2").css("visibility","hidden");
	$("#big_box_right3").css("visibility","hidden");
	}
	
function og() {
	$("#ongoing1").css("display","none");
	$("#ongoing2").css("display","block");
	$("#ongoing_sub").css("display","block");
	$("#upcoming1").css("display","block");
	$("#upcoming2").css("display","none");
	$("#upcoming_sub").css("display","none");
	$("#complete1").css("display","block");
	$("#complete2").css("display","none");
	$("#complete_sub").css("display","none");
	$("#big_box_right").css("visibility","hidden");
	$("#big_box_right2").css("visibility","visible");
	$("#big_box_right3").css("visibility","hidden");
	}
	
function co() {
	$("#ongoing1").css("display","block");
	$("#ongoing2").css("display","none");
	$("#ongoing_sub").css("display","none");
	$("#upcoming1").css("display","block");
	$("#upcoming2").css("display","none");
	$("#upcoming_sub").css("display","none");
	$("#complete1").css("display","none");
	$("#complete2").css("display","block");
	$("#complete_sub").css("display","block");
	$("#big_box_right").css("visibility","hidden");
	$("#big_box_right2").css("visibility","hidden");
	$("#big_box_right3").css("visibility","visible");
	}
</script>

		
		<script type="text/javascript" >
		
		
		$(document).ready(function() {
		var data=1;
		var prop;
		var d;
			$('.gallery_btn a').click(function(){
				//alert('d')
				 data = $(this).attr('data');
				//alert(data);
				 prop= 'example_group_'+data;
				 var d= "a[rel='"+prop+"']";
				 //alert(d)
				
				$(d).fancybox({
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			})
				$(d).first().trigger('click')
			})
			$('.view_look').click(function(){
				//alert('d')
				 //data = $(this).attr('data');
				//alert(data);
				 prop= 'example_group';
				 var d= "a[rel='"+prop+"']";
				 //alert(d)
				//alert(d)
				$(d).fancybox({
				
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			})
				$(d).trigger('click')
			})
			
		

});
</script>
		
        
        <style type="text/css">
		ul#demo-block{ margin:0 15px 15px 15px; }
			ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('../img/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
			ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>
 
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

		<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>-->
        <!--script type="text/javascript" src="../../js/jquery-1.5.1.js"></script-->
        
    <script>
    $(document).ready(function(){
var inner = $('#wrapper'),
    ht = inner.height();

inner.css({'position':'absolute','top':'57%','margin':-ht/2+'px 0 0 0'});

});

    </script>

 
   
     
<script type="text/javascript" src="../../js/jquery.scrollTo.js"></script>

<script>

$(document).ready(function() {
$('#wrapper').scrollTo('#item1', 0);

	$('a.panel').click(function () {

		$('a.panel').removeClass('selected');
		$(this).addClass('selected');
		
		current = $(this);
		
		$('#wrapper').scrollTo($(this).attr('href'), 800);		
		
		return false;
	});

	$(window).resize(function () {
		resizePanel();
	});
	
});

function resizePanel() {

	width = $(window).width();
	height = $(window).height();

	mask_width = width * $('.item').length;
		
	$('#debug').html(width  + ' ' + height + ' ' + mask_width);
		
	$('#wrapper, .item').css({width: width, height: height});
	$('#mask').css({width: mask_width, height: height});
	$('#wrapper').scrollTo($('a.selected').attr('href'), 0);
		
}

</script>
<script src="../../js/jquery.ez-bg-resize.js" type="text/javascript"></script>
	<script>
	function rotate_bg(imn) { 
	
	} 
		$(document).ready(function() {
			
						var BGImageArray = ["past-project-page.jpg"];
			var BGImage = BGImageArray[Math.floor(Math.random()*BGImageArray.length)]

			$("body").ezBgResize({
				img     : "../../images/" + BGImage, // Relative path example.  You could also use an absolute url (http://...).
				opacity : 1, // Opacity. 1 = 100%.  This is optional.
				center  : true // Boolean (true or false). This is optional. Default is true.
			});

		 
		});
      
      
	</script>
  

<?php 
$div_tab1 = mysql_query("SELECT COUNT(*) FROM project WHERE cat = 'Township' AND sub_cat = 'Upcoming'  AND published = 'Y' AND city_id ='".$_REQUEST['id']."'");  
$rw_tab1 = mysql_fetch_array($div_tab1);
$div_tab2 = mysql_query("SELECT COUNT(*) FROM project WHERE cat = 'Township' AND sub_cat = 'Ongoing'  AND published = 'Y' AND city_id ='".$_REQUEST['id']."'");  
$rw_tab2 = mysql_fetch_array($div_tab2);
$div_tab3 = mysql_query("SELECT COUNT(*) FROM project WHERE cat = 'Township' AND sub_cat = 'Complete'  AND published = 'Y' AND city_id ='".$_REQUEST['id']."'");  
$rw_tab3 = mysql_fetch_array($div_tab3);


if($rw_tab1[0] > 0){ echo '<style>#big_box_right2 {visibility:hidden;} #big_box_right3 {visibility:hidden;}</style>';}
else if($rw_tab2[0] > 0){ echo '<style>#big_box_right {visibility:hidden;} #big_box_right3 {visibility:hidden;}</style>';}
else if($rw_tab3[0] > 0){ echo '<style>#big_box_right2 {visibility:hidden;} #big_box_right {visibility:hidden;}</style>';}
else { echo '<style>#big_box_right {visibility:hidden;} #big_box_right2 {visibility:hidden;} #big_box_right3 {visibility:hidden;}</style>';}
?>

    <script src="../../js/tabcontent.js" type="text/javascript"></script>
    
 <!--    <script type="text/javascript" src="../../js/script.js"></script>-->

		<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>-->
        
        <script type="text/javascript" src="../../js/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="../../js/jquery.jscrollpane.min.js"></script>
		<!-- scripts specific to this demo site -->

		<script type="text/javascript" id="sourcecode">
  $(function()
			{
				$('.scroll-pane').jScrollPane({showArrows: true});
			});
        </script>
<script>

function aa1() {

MM_swapImage('Image311','','../../images/overview2.jpg',1);
MM_swapImage('Image9','','../../images/about2.jpg',1);
}

function bb1() {
MM_swapImage('Image311','','../../images/overview1.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
}

function aa2() {
MM_swapImage('Image312','','../../images/vandm2.jpg',1);
MM_swapImage('Image9','','../../images/about2.jpg',1);
}

function bb2() {
MM_swapImage('Image312','','../../images/vandm1.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
}

function aa3() {
MM_swapImage('Image313','','../../images/history2.jpg',1);
MM_swapImage('Image9','','../../images/about2.jpg',1);
}

function bb3() {
MM_swapImage('Image313','','../../images/history1.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
}

function aa4() {
MM_swapImage('Image314','','../../images/brand2.jpg',1);
MM_swapImage('Image9','','../../images/about2.jpg',1);
}

function bb4() {
MM_swapImage('Image314','','../../images/brand1.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
}

function aa5() {
MM_swapImage('Image315','','../../images/social2.jpg',1);
MM_swapImage('Image9','','../../images/about2.jpg',1);
}

function bb5() {
MM_swapImage('Image315','','../../images/social1.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
}

function a6() {
MM_swapImage('Image9','','../../images/about2.jpg',1)
}

function b6() {
MM_swapImage('Image9','','../../images/about1.jpg',1)
}
function hide_menu() {
	$("#sub_tab_main2a").css("display","none");
    MM_swapImage('image1234','','../../images/projects1.jpg',1);
	}
	
function show_menu() {
	$("#sub_tab_main2a").css("display","block");
    MM_swapImage('image1234','','../../images/projects2.jpg',1);
MM_swapImage('Image9','','../../images/about1.jpg',1);
	}
</script>    
     

        
<!-- styles needed by jScrollPane - include in your own sites -->
		<link type="text/css" href="../../css/jquery.jscrollpane4.css" rel="stylesheet" media="all" />

		<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			.scroll-pane
			{
				width: 90%;
				height: 295px;
				overflow: auto;
				padding:0 25px 0 0;
				margin:5px 0 0 0;
			}
			.horizontal-only
			{
				height: auto;
				max-height: 295px;
			}

        </style>

		<!-- latest jQuery direct from google's CDN -->
		<!-- the mousewheel plugin -->
     <script type="text/javascript">
  $(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  </script>
        <!--<link rel="stylesheet" href="../../css/colorbox.css" />-->
		<!--<script src="../js/jquery.min.js"></script>-->
		<!--<script src="../../js/jquery.colorbox.js"></script>-->
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				/*$(".group33").colorbox({rel:'group33', slideshow:true});
				
				$(".group5").colorbox({rel:'group5', slideshow:true});
				$(".group_ogm2").colorbox({rel:'group_ogm2', slideshow:true});
				$(".group_ogfp2").colorbox({rel:'group_ogfp2', slideshow:true});

				$(".group_com2").colorbox({rel:'group_com2', slideshow:true});
				$(".group_cofp2").colorbox({rel:'group_cofp2', slideshow:true});*/
	
				
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>   
      
<!--[if IE 7]>
<style>
#big_box_right {
		width:auto;
		height:auto;
		float:left;
		position:absolute;
		margin:0 0 0 0;
	}
	
#big_box_right2 {
		width:auto;
		height:auto;
		float:left;
		/*background-color:#360;*/
		visibility:hidden;
		position:absolute;
		margin:0 0 0 0;
	}

#big_box_right3 {
		width:auto;
		height:auto;
		float:left;
		/*background-color:#660;*/
		visibility:hidden;
		position:absolute;
		margin:0 0 0 0;
	}
</style>  
<![endif]-->
	<!--[if lte IE 9]>
	<style>  
#menu_my1 {
	width:602px;
	height:23px;
	float:right;
	background-color:#000;
	margin:116px 0 0 0;
	z-index:99999;
	position:absolute;
	right:0;
	}
	</style>  
    <![endif]-->

</head>

<body>
<div id="d_wrap">
  <div id="logo" style="position:fixed; z-index:10;"> <a href="http://mittaluniversal.com/"><img src="../../images/logo.png" width="263" height="96" style="padding:20px 0 0 20px; border:none"></a> </div>
  <div id="menu_my1">



        <ul class="dropdown">
        	<li><a href="http://mittaluniversal.com/">HOME</a></li>
        	<li><a href="http://mittaluniversal.com/about">ABOUT US</a></li>
        	<li><a href="#" style="background-color:#a31d1d;">PROJECTS</a>
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
							$projectquery=mysql_query("select distinct(cat) from project where city_id='$rw[city_id]' order by ord");
							while($rw1=mysql_fetch_assoc($projectquery))
							{
							?>
                            <li><a href="../<?=trim(strtolower($rw1['cat']))?>/index.php?id=<?=$rw['city_id']?>"><?=strtoupper($rw1['cat'])?></a></li>
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
        	<li><a href="http://mittaluniversal.com/past_projects">PAST PROJECTS</a></li>
        	<li><a href="http://mittaluniversal.com/social_activities">CSR</a></li>
            <li><a href="http://mittaluniversal.com/contact">CONTACT</a></li>
        </ul>
		

    
    

</div>
  
  <div id="clear"></div>
  
  
  <div id="wrapper">
    
    <div id="mask">
      
      <div id="item1" class="item">
        
        <a name="item1"></a>
        <div class="content">
        
        
        
        <div id="content">
<div id="d_wrap1">
<div id="overview_left2b">
<div id="view_all"><a href="http://mittaluniversal.com/past_projects/">View all past projects</a></div>
<?php 
$q_upc = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Upcoming' and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
if(mysql_num_rows($q_upc) > 0)
{
?>

<div id="upcoming1"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image50','','../../images/upcoming2.jpg',0)" onClick="uc()"><img src="../../images/upcoming1.jpg" name="Image50" width="104" height="27" id="Image50" style="border:none;"></a></div>
<div id="upcoming2"><img src="../../images/upcoming2.jpg" width="104" height="27"></div>
<div id="upcoming_sub" style="display:none">
<ul class="tabs" style="margin:0px; padding:0px;">
<?php

while($rw_upc = mysql_fetch_array($q_upc))
{
	$pid = $rw_upc['pid'];
	$pro_name = $rw_upc['pro_name'];
?> 
    <li><a href="#" rel="view1_<?=$pid;?>"><?=$pro_name;?></a></li><br>
<?php 
}
?>    
</ul>

</div>
<?php 
} // End if

$q_ong = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Ongoing'  and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
if(mysql_num_rows($q_ong) > 0)
{
?>

<div id="ongoing1" style="display:none;"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image47','','../../images/ongoing2.jpg',1)" onClick="og()"><img src="../../images/ongoing1.jpg" name="Image47" width="104" height="27" id="Image47" style="border:none;"></a></div>
<div id="ongoing2" style="display:block;"><img src="../../images/ongoing2.jpg" width="104" height="27"></div>
<div id="ongoing_sub" style="display:block;">
  <ul class="tabs">
<?php

while($rw_ong = mysql_fetch_array($q_ong))
{
	$pid_ong = $rw_ong['pid'];
	$pro_name_ong = $rw_ong['pro_name'];
?> 
    <li style="margin:0 0 8px 10px; padding:0 0 8px 0; background:url(../../images/doted-line.jpg) bottom repeat-x;"><a href="#" rel="view11_<?=$pid_ong;?>"><?=$pro_name_ong;?></a></li><br>
<?php 
}
?>    
  </ul>
</div>

<?php 
} // End if
$q_comp = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Complete' and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
if(mysql_num_rows($q_comp) > 0)
{
?>

<div id="complete1"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image444','','../../images/complete2.jpg',0)" onClick="co()"><img src="../../images/complete1.jpg" name="Image444" width="104" height="44" id="Image444" style="border:none;"></a></div>
<div id="complete2"><img src="../../images/complete2.jpg" width="104" height="44"></div>
<div id="complete_sub" style="display:none">
  <ul class="tabs">
<?php

while($rw_comp = mysql_fetch_array($q_comp))
{
	$pid_comp = $rw_comp['pid'];
	$pro_name_comp = $rw_comp['pro_name'];
?> 
    <li style="margin:0 0 8px 10px; padding:0 0 8px 0; background:url(../../images/doted-line.jpg) bottom repeat-x;"><a href="#" rel="view111_<?=$pid_comp;?>"><?=$pro_name_comp;?></a></li><br>
<?php 
}
?>    
  </ul>
</div>
<?php 
} // End if
?>
</div>
<div id="overview_left2c"></div>

<!--------------------------------------------------Upcoming box start here-------------------------------------------->
<div id="big_box_right" class="tabcontents1">

<?php
$q_upc_tabcon = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Upcoming' and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
while($rw_upc_tabcon = mysql_fetch_array($q_upc_tabcon))
{
	$pid = $rw_upc_tabcon['pid'];
	$pro_name = $rw_upc_tabcon['pro_name'];
	$pro_area = $rw_upc_tabcon['pro_area'];
    $pro_desc = stripslashes($rw_upc_tabcon['pro_desc']);
	
	($rw_upc_tabcon['floor_plan'] != 'no-image') ? $floor_plan =  "../../admin/upload_images/".$rw_upc_tabcon['floor_plan'] : $floor_plan = 'no-image';
	($rw_upc_tabcon['floor_plan2'] != 'no-image') ? $floor_plan2 = "../../admin/upload_images/".$rw_upc_tabcon['floor_plan2'] : $floor_plan2 = 'no-image';
	($rw_upc_tabcon['floor_plan3'] != 'no-image') ? $floor_plan3 = "../../admin/upload_images/".$rw_upc_tabcon['floor_plan3'] : $floor_plan3 = 'no-image';
	($rw_upc_tabcon['floor_plan4'] != 'no-image') ? $floor_plan4 = "../../admin/upload_images/".$rw_upc_tabcon['floor_plan4'] : $floor_plan4 = 'no-image';
	($rw_upc_tabcon['floor_plan5'] != 'no-image') ? $floor_plan5 = "../../admin/upload_images/".$rw_upc_tabcon['floor_plan5'] : $floor_plan5 = 'no-image';
	
	($rw_upc_tabcon['map'] != 'no-image') ? $map = "../../admin/upload_images/".$rw_upc_tabcon['map'] : $map = 'no-image';
	($rw_upc_tabcon['brochure'] != 'no-image') ? $brochure = "../../admin/upload_pdfs/".$rw_upc_tabcon['brochure'] : $brochure = 'no-image';
?>

<div id="view1_<?=$pid;?>" class="tabcontent">
<div id="overview_left2a">
<div class="scroll-pane">
      <p style="margin:0px; padding:0px;">
      <!--<div id="ongoing">Upcoming</div>-->
      <div style="float:left; width:100%; height:auto;" class="black16_d"><?=strtoupper($pro_name);?></div><br>
      <div style="float:left; width:100%; height:auto; margin:0 0 10px 0;" class="black16a_d"><?=strtoupper($pro_area);?></div>
      <div style="float:left; width:100%; height:auto; padding:0 0 15px 0;" class="grey13">
      <?=$pro_desc;?>
      </div>
      </p>
    </div>
  </div>
  <?php
        $q_upc_tabcon_img = mysql_query("select * from image where pid = $pid order by image_id limit 1");	
		if(mysql_num_rows($q_upc_tabcon_img) > 0)
		{
  ?>
  <div id="overview_right2">
  <div id="big_gallery"  class="gallery_btn" ><a data="<?php echo $pid; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4611','','../../images/small_screen_1.png',0)"><img src="../../images/small_screen.png" name="Image4611" width="40" height="26" id="Image46" style="border:none;"></a></div>
  <div id="productprice_box1">
  
        <?php
			while($rw_upc_tabcon_img = mysql_fetch_array($q_upc_tabcon_img))
			{
				$img_title = $rw_upc_tabcon_img['title'];
				$pro_image = "../../admin/image.php?src=".$rw_upc_tabcon_img['image']."&x=415&y=293&f=0";	
		?>

              <img src="<?=$pro_image;?>" alt="" width="415" height="293" class="image8 proj_image_pos" title=""  style="border:none;">
            	
         <?php
			} //End While
		 ?>   
          </div></div>
  <?php
		} // End If
  ?>
    
  <div id="clear"></div>
  <div id="overview_bottom">
  <?php if($brochure != 'no-image') { ?>
  <div id="project_bottom_btn_new"><a href="<?=$brochure;?>" target="_blank">E brochure</a></div>
  
  <?php } if($brochure != 'no-image' && $map != 'no-image') { ?>
  <div id="project_bottom_btn">|</div>
  
  <?php } if($map != 'no-image') { ?>
  <div id="project_bottom_btn_new"> <a class="group3<?=$pid;?>"  href="<?=$map;?>" title="">View Map</a></div>

  <?php } if($floor_plan != 'no-image' && $map != 'no-image') { ?>
    <div id="project_bottom_btn">|</div>
  
  <?php } ?>
  <div id="project_bottom_btn_new"> 
  <?php if($floor_plan != 'no-image') { ?>
  <a class="group4<?=$pid;?>"  href="<?=$floor_plan;?>" title="">View Floor Plan</a>
  <?php }  if($floor_plan2 != 'no-image') { ?>
  <p style="display:none;"><a class="group4<?=$pid;?>"  href="<?=$floor_plan2;?>" title="">View Floor Plan2</a></p>
  <?php }  if($floor_plan3 != 'no-image') { ?>
  <p style="display:none;"><a class="group4<?=$pid;?>"  href="<?=$floor_plan3;?>" title="">View Floor Plan3</a></p>
  <?php }  if($floor_plan4 != 'no-image') { ?>
  <p style="display:none;"><a class="group4<?=$pid;?>"  href="<?=$floor_plan4;?>" title="">View Floor Plan4</a></p>
  <?php }  if($floor_plan5 != 'no-image') { ?>
  <p style="display:none;"><a class="group4<?=$pid;?>"  href="<?=$floor_plan5;?>" title="">View Floor Plan5</a></p>
  <?php }?>
  </div></div>
 </div>
<div class="fancybox" style="display:none;" >
				<?php $sql="select * from image where pid = $pid order by image_id"; 

			$result =mysql_query($sql);
			$count= mysql_num_rows($result);
			//echo $pid;
			//echo 'sky';
			//echo $count;
			?>
			<ul id="fancy_box" >
			<?php while($row=mysql_fetch_array($result)){ ?>
			<li ><a rel="example_group_<?php echo $pid ;?>" href="../../admin/upload_images/<?php echo $row['image'] ; ?>" ><img src="../../admin/upload_images/<?php echo $row['image'] ; ?>" ></a></li>
			<?php }?>
			</ul>
 </div> 
 <script>
   $(document).ready(function(){ 
  $(".group4<?=$pid;?>").colorbox({rel:'group4<?=$pid;?>', slideshow:true});
  $(".group3<?=$pid;?>").colorbox({rel:'group3<?=$pid;?>', slideshow:true});
   });
  </script>
 
<?php 
}    //End While
?> 
 </div> 
<!--------------------------------------------------Upcoming box end here-------------------------------------------->


<!--------------------------------------------------Ongoing box start here------------------------------------------->

<div id="big_box_right2" class="tabcontents1">
<?php
$q_ong_tabcon = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Ongoing'  and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
while($rw_ong_tabcon = mysql_fetch_array($q_ong_tabcon))
{
	$pid = $rw_ong_tabcon['pid'];
	$pro_name = $rw_ong_tabcon['pro_name'];
	$pro_area = $rw_ong_tabcon['pro_area'];
    $pro_desc = stripslashes($rw_ong_tabcon['pro_desc']);
	
	($rw_ong_tabcon['floor_plan'] != 'no-image') ? $floor_plan =  "../../admin/upload_images/".$rw_ong_tabcon['floor_plan'] : $floor_plan = 'no-image';
	($rw_ong_tabcon['floor_plan2'] != 'no-image') ? $floor_plan2 = "../../admin/upload_images/".$rw_ong_tabcon['floor_plan2'] : $floor_plan2 = 'no-image';
	($rw_ong_tabcon['floor_plan3'] != 'no-image') ? $floor_plan3 = "../../admin/upload_images/".$rw_ong_tabcon['floor_plan3'] : $floor_plan3 = 'no-image';
	($rw_ong_tabcon['floor_plan4'] != 'no-image') ? $floor_plan4 = "../../admin/upload_images/".$rw_ong_tabcon['floor_plan4'] : $floor_plan4 = 'no-image';
	($rw_ong_tabcon['floor_plan5'] != 'no-image') ? $floor_plan5 = "../../admin/upload_images/".$rw_ong_tabcon['floor_plan5'] : $floor_plan5 = 'no-image';
	
	($rw_ong_tabcon['map'] != 'no-image') ? $map = "../../admin/upload_images/".$rw_ong_tabcon['map'] : $map = 'no-image';
	($rw_ong_tabcon['brochure'] != 'no-image') ? $brochure = "../../admin/upload_pdfs/".$rw_ong_tabcon['brochure'] : $brochure = 'no-image';
?>

<div id="view11_<?=$pid;?>" class="tabcontent1">
<div id="overview_left2a">
<div class="scroll-pane">
      <p style="margin:0px; padding:0px;">
      <!--<div id="ongoing">Ongoing</div>-->
      <div style="float:left; width:100%; height:auto;" class="black16_d"><?=strtoupper($pro_name);?></div><br>
      <div style="float:left; width:100%; height:auto; margin:0 0 10px 0;" class="black16a_d"><?=strtoupper($pro_area);?></div>
      <div style="float:left; width:100%; height:auto; padding:0 0 15px 0;" class="grey13">
      <?=$pro_desc;?>
    </div>
      </p>
    </div>
  </div>
  <?php
        $q_ong_tabcon_img = mysql_query("select * from image where pid = $pid order by image_id limit 1");	
		if(mysql_num_rows($q_ong_tabcon_img) > 0)
		{
  ?>
  <div id="overview_right2">
  <div id="big_gallery" class="gallery_btn" ><a data="<?php echo $pid; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image46','','../../images/small_screen_1.png',0)"><img src="../../images/small_screen.png" name="Image46" width="40" height="26" id="Image46" style="border:none;"></a></div>
  <div id="productprice_box1">
 
        <?php
			while($rw_ong_tabcon_img = mysql_fetch_array($q_ong_tabcon_img))
			{
				$img_title = $rw_ong_tabcon_img['title'];
				$pro_image = "../../admin/image.php?src=".$rw_ong_tabcon_img['image']."&x=415&y=293&f=0";	
		?>
              <img src="<?=$pro_image;?>" alt="" class="image8" title=""  style="border:none;">
            	
         <?php
			} //End While
		 ?>   
          </div></div>
  <?php
		} // End If
  ?>
    
  <div id="clear"></div>
  <div id="overview_bottom">
  <?php if($brochure != 'no-image') { ?>
  <div id="project_bottom_btn_new"><a href="<?=$brochure;?>" target="_blank">E brochure</a></div>
  
  <?php } if($brochure != 'no-image' && $map != 'no-image') { ?>
  <div id="project_bottom_btn">|</div>
  
  <?php } if($map != 'no-image') { ?>
	<div id="project_bottom_btn_new"> <a class="group_ogm1<?=$pid;?> view_look"  href="#" title="">View Map</a></div>
	<div class="fancy-box2" style="display:none;"><a rel="example_group" href="<?php echo $map ;?>" ><img src="<?php echo $map ;?>" ></a></div>
  <?php } if($floor_plan != 'no-image' && $map != 'no-image') { ?>
    <div id="project_bottom_btn">|</div>
  
  <?php } ?> 
  <div id="project_bottom_btn_new"> 
  <?php if($floor_plan != 'no-image') { ?>
  <a class="group_ogfp1<?=$pid;?>"  href="<?=$floor_plan;?>" title="">View Floor Plan</a>
  <?php }  if($floor_plan2 != 'no-image') { ?>
  <p style="display:none;"><a class="group_ogfp1<?=$pid;?>" href="<?=$floor_plan2;?>" title="">View Floor Plan2</a></p>
  <?php }  if($floor_plan3 != 'no-image') { ?>
  <p style="display:none;"><a class="group_ogfp1<?=$pid;?>" href="<?=$floor_plan3;?>" title="">View Floor Plan3</a></p>
  <?php }  if($floor_plan4 != 'no-image') { ?>
  <p style="display:none;"><a class="group_ogfp1<?=$pid;?>" href="<?=$floor_plan4;?>" title="">View Floor Plan4</a></p>
  <?php }  if($floor_plan5 != 'no-image') { ?>
  <p style="display:none;"><a class="group_ogfp1<?=$pid;?>" href="<?=$floor_plan5;?>" title="">View Floor Plan5</a></p>
  <?php }?>
	</div></div>
 </div>
<div class="fancybox" style="display:none;" >
				<?php $sql="select * from image where pid = $pid order by image_id"; 

			$result =mysql_query($sql);
			$count= mysql_num_rows($result);
			//echo $pid;
			//echo 'sky';
			//echo $count;
			?>
			<ul id="fancy_box" >
			<?php while($row=mysql_fetch_array($result)){ ?>
			<li ><a rel="example_group_<?php echo $pid ;?>" href="../../admin/upload_images/<?php echo $row['image'] ; ?>" ><img src="../../admin/upload_images/<?php echo $row['image'] ; ?>" ></a></li>
			<?php }?>
			</ul>
 </div> 
 <script>
  $(document).ready(function(){ 

 $(".group_ogfp1<?=$pid;?>").colorbox({rel:'group_ogfp1<?=$pid;?>', slideshow:true});
 $(".group_ogm1<?=$pid;?>").colorbox({rel:'group_ogm1<?=$pid;?>', slideshow:true});
  });
 </script>
<?php 
}    //End While
?> 
 </div> 
<!--------------------------------------------------Ongoing box end here-------------------------------------------->



<!--------------------------------------------------Complete box start here------------------------------------------->

<div id="big_box_right3" class="tabcontents1">
<?php
$q_comp_tabcon = mysql_query("select * from project where cat = 'Township' and sub_cat = 'Complete'  and published = 'Y' AND city_id ='".$_REQUEST['id']."'");
while($rw_comp_tabcon = mysql_fetch_array($q_comp_tabcon))
{
	$pid = $rw_comp_tabcon['pid'];
	$pro_name = $rw_comp_tabcon['pro_name'];
	$pro_area = $rw_comp_tabcon['pro_area'];
    $pro_desc = stripslashes($rw_comp_tabcon['pro_desc']);
	
	($rw_comp_tabcon['floor_plan'] != 'no-image') ? $floor_plan =  "../../admin/upload_images/".$rw_comp_tabcon['floor_plan'] : $floor_plan = 'no-image';
	($rw_comp_tabcon['floor_plan2'] != 'no-image') ? $floor_plan2 = "../../admin/upload_images/".$rw_comp_tabcon['floor_plan2'] : $floor_plan2 = 'no-image';
	($rw_comp_tabcon['floor_plan3'] != 'no-image') ? $floor_plan3 = "../../admin/upload_images/".$rw_comp_tabcon['floor_plan3'] : $floor_plan3 = 'no-image';
	($rw_comp_tabcon['floor_plan4'] != 'no-image') ? $floor_plan4 = "../../admin/upload_images/".$rw_comp_tabcon['floor_plan4'] : $floor_plan4 = 'no-image';
	($rw_comp_tabcon['floor_plan5'] != 'no-image') ? $floor_plan5 = "../../admin/upload_images/".$rw_comp_tabcon['floor_plan5'] : $floor_plan5 = 'no-image';
	
	($rw_comp_tabcon['map'] != 'no-image') ? $map = "../../admin/upload_images/".$rw_comp_tabcon['map'] : $map = 'no-image';
	($rw_comp_tabcon['brochure'] != 'no-image') ? $brochure = "../../admin/upload_pdfs/".$rw_comp_tabcon['brochure'] : $brochure = 'no-image';
?>


<div id="view111_<?=$pid;?>" class="tabcontent3">
<div id="overview_left2a">
<div class="scroll-pane">
      <p style="margin:0px; padding:0px;">
      <!--<div id="ongoing">Recently complete</div>-->
      <div style="float:left; width:100%; height:auto;" class="black16_d"><?=strtoupper($pro_name);?></div><br>
      <div style="float:left; width:100%; height:auto; margin:0 0 10px 0;" class="black16a_d"><?=strtoupper($pro_area);?></div>
      <div style="float:left; width:100%; height:auto; padding:0 0 15px 0;" class="grey13">
       <?=$pro_desc;?>
      </div>
      </p>
    </div>
  </div>
  <?php
        $q_comp_tabcon_img = mysql_query("select * from image where pid = $pid order by image_id limit 1");	
		if(mysql_num_rows($q_comp_tabcon_img) > 0)
		{
  ?>
  <div id="overview_right2">
  <div id="big_gallery" class="gallery_btn" ><a data="<?php echo $pid; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image46','','../../images/small_screen_1.png',0)"><img src="../../images/small_screen.png" name="Image46" width="40" height="26" id="Image46" style="border:none;"></a></div>
  <div id="productprice_box1">
  
        <?php
			while($rw_comp_tabcon_img = mysql_fetch_array($q_comp_tabcon_img))
			{
				$img_title = $rw_comp_tabcon_img['title'];
				$pro_image = "../../admin/image.php?src=".$rw_comp_tabcon_img['image']."&x=415&y=293&f=0";	
		?>
              <img src="<?=$pro_image;?>" alt="" width="415" height="293" class="image8 proj_image_pos" title=""  style="border:none;">
            	
         <?php
			} //End While
		 ?>   
          </div></div>
  <?php
		} // End If
  ?>
  <div id="clear"></div>
  <div id="overview_bottom">
  <?php if($brochure != 'no-image') { ?>
  <div id="project_bottom_btn_new"><a href="<?=$brochure;?>" target="_blank">E brochure</a></div>
  
  <?php } if($brochure != 'no-image' && $map != 'no-image') { ?>
  <div id="project_bottom_btn">|</div>
  
  <?php } if($map != 'no-image') { ?>
  <div id="project_bottom_btn_new"> <a class="group_com1<?=$pid;?>"  href="<?=$map;?>" title="">View Map</a></div>

  <?php } if($floor_plan != 'no-image' && $map != 'no-image') { ?>
    <div id="project_bottom_btn">|</div>
  
  <?php } ?>
  <div id="project_bottom_btn_new"> 
  <?php if($floor_plan != 'no-image') { ?>
  <a class="group_cofp1<?=$pid;?>"  href="<?=$floor_plan;?>" title="">View Floor Plan</a>
  <?php }  if($floor_plan2 != 'no-image') { ?>
  <p style="display:none;"><a class="group_cofp1<?=$pid;?>" href="<?=$floor_plan2;?>" title="">View Floor Plan2</a></p>
  <?php }  if($floor_plan3 != 'no-image') { ?>
  <p style="display:none;"><a class="group_cofp1<?=$pid;?>" href="<?=$floor_plan3;?>" title="">View Floor Plan3</a></p>
  <?php }  if($floor_plan4 != 'no-image') { ?>
  <p style="display:none;"><a class="group_cofp1<?=$pid;?>" href="<?=$floor_plan4;?>" title="">View Floor Plan4</a></p>
  <?php }  if($floor_plan5 != 'no-image') { ?>
  <p style="display:none;"><a class="group_cofp1<?=$pid;?>" href="<?=$floor_plan5;?>" title="">View Floor Plan5</a></p>
  <?php }?>
  </div></div>
</div>
<div class="fancybox" style="display:none;" >
				<?php $sql="select * from image where pid = $pid order by image_id"; 

			$result =mysql_query($sql);
			$count= mysql_num_rows($result);
			//echo $pid;
			//echo 'sky';
			//echo $count;
			?>
			<ul id="fancy_box" >
			<?php while($row=mysql_fetch_array($result)){ ?>
			<li ><a rel="example_group_<?php echo $pid ;?>" href="../../admin/upload_images/<?php echo $row['image'] ; ?>" ><img src="../../admin/upload_images/<?php echo $row['image'] ; ?>" ></a></li>
			<?php }?>
			</ul>
 </div>
  <script>
  $(document).ready(function(){ 
	  $(".group_cofp1<?=$pid;?>").colorbox({rel:'group_cofp1<?=$pid;?>', slideshow:true});
	  $(".group_com1<?=$pid;?>").colorbox({rel:'group_com1<?=$pid;?>', slideshow:true});
  });
  </script>

<?php 
}    //End While
?> 
  
</div>

<!--------------------------------------------------Complete box end here-------------------------------------------->


</div>
        
        
        </div>
        </div>
      </div>
      
      
   
      
     
      
     
      
      
      
      </div>
  </div>
</div>
<div id="footer" style="position:fixed;">
<div id="footer_link" class="footer_link"><a class='ajax' href="../../legal-disclamer.html">Legal Disclamer</a><br>
COPYRIGHT © 2013. ALL RIGHTS RESERVED.&nbsp; | &nbsp;Designed by <a href="http://www.skarma.com/" target="_blank">skarma.com</a></div>
<div id="footer_icon">
<div id="fb"><a href="http://www.facebook.com/MittalUniversal" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','../../images/fb2.png',1)"><img src="../../images/fb1.png" name="Image2" width="26" height="26" id="Image2" style="border:none"></a></div><div id="foot_devide" style="margin:0 6px 0 2px;"><img src="../../images/footer_devide.png" width="2" height="26"></div>
<div id="fb"><a href="mailto:sales@mittaluniversal.com" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','../../images/email2.png',1)"><img src="../../images/email1.png" name="Image4" width="26" height="26" id="Image4" style="border:none"></a></div>
</div>

</div>
<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu3","menuhover");
</script>
<!-- colorbox -->
<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
<script>
$(".ajax").colorbox({innerWidth:600, innerHeight:380});
</script>

</body>
<style>
ul {
list-style:none;
}

li {
list-style:none;
}
</style>
</html>
