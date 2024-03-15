<?php
session_start();
include("config.php"); 
if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) { 


if(isset($_REQUEST['cat']) && $_REQUEST['cat']!= '' && isset($_REQUEST['sub_cat']) && $_REQUEST['sub_cat']!= '' && isset($_REQUEST['published']) && $_REQUEST['published']!= '')
{
	$published = ($_REQUEST['published'] == 'Y') ? 'N' : 'Y';
	$q = "update project set published = '".$published."' where cat = '".$_REQUEST['cat']."' and sub_cat = '".$_REQUEST['sub_cat']."'";
	if(mysql_query($q))
	{
		echo '<script>window.location = "publish_category.php";</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/checkall.js"></script> 
<script src="includes/ckeditor/ckeditor_basic_source.js"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '" />');
   

function __val(_frm) { 
_err = "";
_hname = _frm.title.value;

if(!_hname) _err += "> Please enter image name. \n";
if(_err) { alert(_err); return false; } else return true;
}

 
function _DelConfirm(url) { 
var c = confirm("Are you sure to delete this image! \n\n To proceed press \'Ok\' Or press \'Cancel\' to stay the entry");
if(c) location = url;
else return false;
}

function delcheck()
{
 var chk=document.form1.chk
    var total=""
	if((chk.length)>0)
	{
		for(var i=0; i < chk.length; i++)
		{
		  if(chk[i].checked)
		  total +=chk[i].value + "\n"
		}
		 if(total=="")
		 {
		  alert("Please select record to delete!") 
		 }
		 else
		 { 
		   if(confirm("Do you really want to delete this record")==true)
		   {
		    document.form1.submit()
		   }
		 }
	}
	else
	{
	  if(chk.checked)
	  {
	    if(confirm("Do you really want to delete this record")==true)
		{
		 document.form1.submit()
	    }
	  }
	  else
	  {
	   alert("Please select any record")
	  }
	}
 }


function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for image
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}


function ___save_ord(_oid, _newval) { 
var http = false;
if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
}
_url = "action.php?do=save_order&oid=" + _oid + "&newval=" + _newval; //alert(_url);
http.open("GET", _url);
http.onreadystatechange=function() {
  if(http.readyState == 4) {
  // alert(http.responseText);
  }
}
http.send(null);
}

</script>
<script type="text/javascript" src="inc/sortTable.js"></script> 
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

<script type="text/javascript" src="inc/uploader/common.js" ></script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body onload="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Adobe Flash Player. Do you want to download it now?');">
	<div id="container">
    	<div id="header">
        	<?php 
			include($admin_includes."head_top.php");
			require_once 'includes/Pager/Pager.php';
			 ?>
    <div id="topmenu">
            	<?php $_GET['tab'] = 5	; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <!--<li><a href="publish_category" class="report"><strong>Manage Home</strong></a></li>
                    <li><a href="about.php" class="report">Manage About us</a></li>-->
                    <li><a href="publish_category.php" class="report"><strong>Project Category</strong></a></li>
                    <li><a href="city.php" class="report"><strong>City</strong></a></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
           
           
            <div id="content">
            
            
            <div id="box">
                	<h3><strong>Publish/Unpublish Project Category</strong></h3>
                    <p align="right" style="height:16px; margin-right:07px; z-index:-10000;">
                    </p>
				
           	  <form name="form1" id="form1" method="post"> 
                    <table width="100%" >
						<thead>
							<tr>
							  <th width="225"><a href="#">Category</a></th>
							  <th width="226"><a href="#">Sub Category</a></th>
                              <th width="237"><a href="#">Action</a></th>
                          </tr>
						</thead>
						<tbody>
							
                            
                          <tr>
                              <td>Commercial</td>
                              <td>Upcoming</td>
                              <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Commercial' and sub_cat = 'Upcoming' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                               </td>
                            </tr>
                          <tr>
                            <td>Commercial</td>
                            <td>Ongoing</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Commercial' and sub_cat = 'Ongoing' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Commercial</td>
                            <td>Complete</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Commercial' and sub_cat = 'Complete' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Residential</td>
                            <td>Upcoming</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Residential' and sub_cat = 'Upcoming' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Residential</td>
                            <td>Ongoing</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Residential' and sub_cat = 'Ongoing' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Residential</td>
                            <td>Complete</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Residential' and sub_cat = 'Complete' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Hospitality</td>
                            <td>Upcoming</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Hospitality' and sub_cat = 'Upcoming' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Hospitality</td>
                            <td>Ongoing</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Hospitality' and sub_cat = 'Ongoing' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Hospitality</td>
                            <td>Complete</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Hospitality' and sub_cat = 'Complete' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="center"></td>
                          </tr>
                          <tr>
                            <td>Township</td>
                            <td>Upcoming</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Township' and sub_cat = 'Upcoming' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Township</td>
                            <td>Ongoing</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Township' and sub_cat = 'Ongoing' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                          <tr>
                            <td>Township</td>
                            <td>Complete</td>
                            <td align="center">
                                <?php
                                	$q_cu = mysql_query("select pid, cat, sub_cat, published from project where cat = 'Township' and sub_cat = 'Complete' limit 1" ); 
									if(mysql_num_rows($q_cu) > 0)
									{
										$rw_cu = mysql_fetch_array($q_cu);
										$published = ($rw_cu['published']);
										$pub = ($published == 'Y') ? '<span style="color:#390;">Unpublish</span>' : '<span style="color:#F00;">Publish</span>';
										
								?>
                              
                                <a href="publish_category.php?cat=<?=$rw_cu['cat'];?>&sub_cat=<?=$rw_cu['sub_cat'];?>&published=<?=$rw_cu['published'];?>"><?=$pub;?></a> 
                                <?php
									}
									else
									{ 
										echo '<a href="index.php#add"><span style="color:#00F;">No project exist click to add project</span></a>';
									}
								?>
                            </td>
                          </tr>
                        </tbody>
					</table>
                    
           	  </form>        
         
                  
              </div>
           <br /><br /> 
                             
                    
            </div>
			<div id="sidebar">
  				<?php include($admin_includes."right_nav_bar.php"); ?>
			</div>	
      </div>
        <div id="footer">
       <?php include($admin_includes."footer.php"); ?>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
<?php } else header("location:login.php?err=2"); ?>