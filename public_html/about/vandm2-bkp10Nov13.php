<?php
include("../admin/config.php"); 
$q = mysql_query("select * from pages where category = 'About_us' and aboutCat = 'Vision_N_Mission' limit 1");
$rw = mysql_fetch_array($q);
$title = $rw['title'];
$content = stripslashes($rw['content']);
$image = "../admin/image.php?src=".$rw['image']."&x=416&y=292&f=0";	
$pg_title = $rw['pg_title'];
$pg_desc = $rw['pg_desc'];
$pg_keywords = $rw['pg_keywords'];
?>

<!doctype html>
<html>
<head>
<title><?=$pg_title;?></title>
<meta charset="utf-8">
<meta name="keywords" content="<?=$pg_keywords;?>"/>
<meta name="description" content="<?=$pg_desc;?>"/>
<link href="../css/style.css" rel="stylesheet" type="text/css">


		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="../js/jquery.jscrollpane.min.js"></script>
		<!-- scripts specific to this demo site -->

		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane({showArrows: true});
			});
		</script>
        
   


 
 
  
     
     




		<!-- styles needed by jScrollPane - include in your own sites -->
		<link type="text/css" href="../css/jquery.jscrollpane4.css" rel="stylesheet" media="all" />

		<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			.scroll-pane
			{
				width: 90%;
				height: 290px;
				overflow: auto;
				padding:0 20px 0 0;
			}
			.horizontal-only
			{
				height: auto;
				max-height: 290px;
			}
		</style>

		<!-- latest jQuery direct from google's CDN -->
		<!-- the mousewheel plugin -->
		
</head>

<body>
<div id="d_wrap">
<div id="overview_left2">
        
    <div class="scroll-pane">
   <p style="padding:0px; margin:0px;">   
<div style="padding:0 0 10px 0" class="black16_d"><?=strtoupper($title);?></div>
<div class="grey13">
  <?=$content;?>
        </div>
        </p>
    </div>
  </div>
  <div id="overview_right2"><img src="<?=$image;?>" width="416" height="292"></div>

      
</div>
</body>
</html>
