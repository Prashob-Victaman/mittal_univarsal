<?php
session_start();
include("config.php"); 
if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) { 
if(!empty($_GET['show'])) $_SESSION['limit'] =  $_GET['show'];

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
            	<?php $_GET['tab'] = 4	; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <!--<li><a href="home.php" class="report"><strong>Manage Home</strong></a></li>
                    <li><a href="about.php" class="report">Manage About us</a></li>-->
                </ul>
            </div>
      </div>
        <div id="wrapper">
           
           
            <div id="content">
            
            
            <div id="box">
                	<h3><strong>Home </strong></h3>
                    <p align="right" style="height:16px; margin-right:07px; z-index:-10000;">
                    </p>
                	<?php
					// DELETE 
					if(!empty($_GET['do']) && !empty($_GET['image_id']) && $_GET['do'] == 'del') 
					{ 
						$sql="Select image from home_image where image_id='".$_GET['image_id']."' ";
						$rs=mysql_query($sql);
						$row=mysql_fetch_array($rs);
						
						$p1 = $img_dir."".$row['image'];
						if(file_exists($p1))
						{
							unlink($p1);
						}
						
						$q = "DELETE FROM home_image WHERE image_id = {$_GET['image_id']} LIMIT 1";  
						if(mysql_query($q))   
							print "<script>alert('Image deleted successfully!'); location='home.php';</script>";
						else 
						{ 
							session_destroy(); print "<script>alert('Fatal Error!! For security reasons, we are logging you out!'); location='index.php';</script>"; 
						}
					}	
					//END DELETE 
					
					
					
				//Delete multiple User
					if(isset($_POST['action']) && $_POST['action']=="Delete")
					{
					  foreach($_POST['chk'] as $key)
					  {
							$sql="Select image from home_image where image_id='".$key."' ";
							$rs=mysql_query($sql);
							$row=mysql_fetch_array($rs);
							
							$p1 = $img_dir."".$row['image'];
							if(file_exists($p1))
							{
								unlink($p1);
							}
					  
							mysql_query("delete from home_image where image_id=".$key);
					  }
					  echo "<script>alert('Image deleted successfully!'); location='home.php';</script>";
					}
				//Delete multiple User
					
				
				// START INSERTING DATA TO DB
				if(isset($_POST['image_add']) && !empty($_POST['image_add']) && $_POST['image_add'] == "Y") 
				{ 
				
				$cr_date = date("Y-m-d H:i:s");
				$cr_user = $_SESSION['uname'];
				$cr_ip = $_SERVER['REMOTE_ADDR'];
				
				$title = addslashes($_POST['title']);
							
				$image = (!empty($_FILES['image']['name'])) ? time().$_FILES['image']['name'] : 'no-image';
							
				$q_dupl=mysql_query("select count(*) from home_image where title='".$title."'");
				$rw_dupl = mysql_fetch_array($q_dupl);  
				
				$f2 = 0;
				if($rw_dupl[0] == 0)
				{
				   
					if($image != 'no-image')
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($image) == true)
						{
							$p1 = $img_dir."".$image;
							move_uploaded_file($_FILES['image']['tmp_name'], $p1);
							$f2 = 1;
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
					}
				
					 if($f2 == 1)
					 {
							$q = "INSERT INTO home_image(title,image,cr_date,cr_user,cr_ip) VALUES('$title', '$image','$cr_date','$cr_user','$cr_ip')"; 		
							//echo $q ; exit;
								
							if(@mysql_query($q)) print "<font color='green'>Added succesfuly!</font>";	
							else print "<font color='red'>An error occured while trying to process your request. Please try again later!</font>";	
					 }
					 else
					 {
						 print "<font color='red'>You have tried invalied image files. Please select correct file!</font>";	
					 }
					
					}	
				}	
				// END INSERTING DATA TO DB
				
				?>
                	<form name="form1" id="form1" method="post"> 
                    <table width="100%" >
						<thead>
							<tr>
							  <th width="10"><input type="checkbox" name="chk" id="chk" onclick="check(this.form.chk)" value=""/></th>
							  <th width="80">Display Order</th>
							  <th><a href="#">Description</a></th>
                              <th>Image</th>
                              <th>Added On</th>
                              <th width="80"><a href="#">Action</a></th>
                          </tr>
						</thead>
						<tbody>
							
<?php 
		
$wer = ' '; 							

 							
// get the pager input values
  $page = (!empty($_GET['p'])) ? $_GET['p'] : '';
  
  $limit = (!empty($_SESSION['limit'])) ? $_SESSION['limit'] : 10; // set the max data each page
  $result = mysql_query("SELECT count(*) as cnt FROM home_image $wer");
  $total = mysql_result($result, 0, "cnt");
  $fdir = $_SERVER['PHP_SELF']; 
  $pager  = Pager::getPagerData($total, $limit, $page);
  $offset = $pager->offset;
  $limit  = $pager->limit;
  $page   = $pager->page; 
  if($total == 0) $offset = 0;
  
  $rs = mysql_query("SELECT * FROM home_image $wer ORDER BY lstOrder  LIMIT $offset, $limit");	
  
							if($total > 0) { 									
							while($rw = mysql_fetch_array($rs)) 
							{ 
								$tit = stripslashes($rw['title']);
								$title = (strlen($tit) > 50) ? substr($tit,0,50).".." : $tit;
								$image = $rw['image'];	
								$lstOrder = $rw['lstOrder'];	
								$cr_date = date("M d, Y",strtotime($rw['cr_date']));
							?>
                            
                            <tr>
                              <td align="center"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $rw['image_id'];?>" /></td>
                              <td align="center">
                                <input onblur="___save_ord(<?=$rw['image_id'];?>,this.value)" type="text" name="ord<?=$rw['image_id'];?>" value="<?=$lstOrder;?>" style="width:50px; text-align:center; height:12px; "/>
                             </td>
                              <td><a href="home.php?do=vedit&image_id=<?=$rw['image_id'];?>#ES"><?=$title;?></a></td>
                                <td><img src="image.php?src=<?=$image;?>&x=100&f=0" border=1 align="top"/></td>
                                                            
                              <td><?=$cr_date;?></td>
                                <td align="center">
                                 <a href="home.php?do=vedit&image_id=<?=$rw['image_id'];?>#ES">Edit</a> <b>&nbsp;|&nbsp;</b>
                                 <a href="javascript:;" onclick="_DelConfirm('home.php?do=del&image_id=<?=$rw['image_id'];?>');">Delete</a>                                 </td>
                            </tr>
							<? }  // end while
							} // end rec counf if
							else print "<tr><td colspan=5 align='center'>No images exist! Please add to list here.</td></tr>";
							?>
						</tbody>
					</table>
                    <input type="button" name="delete" value="Delete Multiple" onclick="javascript:delcheck();" style="color:#F25; height:22px;  border:#fff dotted 2px;"/>
                  
                    <input type="hidden" name="action" value="Delete" />
            </form>        
         
<script>
function __limit(_val) {
<? if(empty($_GET['cat']) && empty($_GET['p'])) { ?>  
location = 'home.php?show='+_val;
<? } else { ?>
location = 'home.php?<?=$_SERVER['QUERY_STRING'];?>&show='+_val;
<? } ?> 
}
</script>
                    	
		    <div id="pager">
            <center>
                    	
         <?php
						$u = (!empty($_GET['pid'])) ? 'home.php?pid='.$_GET['pid'].'&' : 'home.php?';
                        if ($page == 1) { print "<img src='img/icons/arrow_left.gif' width=16 height=16 border=0/>";  } else { 
						print "<a href=\"".$u."p=".($page-1)."\"><img src='img/icons/arrow	_left.gif' width=16 height=16 border=0/></a>"; }
						echo "<input  value='$page' type='text' name='page' id='page' style='width:25px;'/>";
						if ($page == $pager->numPages)  print "<img src='img/icons/arrow_right.gif' width=16 height=16 border=0 />";  else  
						print "<a href=\"".$u."p=".($page + 1)."\"><img src='img/icons/arrow_right.gif' width=16 height=16 border=0 /></a>"; 
						print " of $pager->numPages &nbsp; "; 
						print "<select name='limit' id='limit' onchange='__limit(this[this.selectedIndex].value);'><option value='10' selected='selected'>10</option><option value='20'>20</option><option value='50'>50</option><option value='100'>100</option><option value='150'>150</option><option value='200'>200</option><option value='250'>250</option></select> per page | Total <strong>$total</strong> records found";
?>               
                        
</center>
 </div>				
						
<script>
setSelect(document.getElementById('limit'), <?=!empty($_SESSION['limit'])?$_SESSION['limit']:'20';?>);
</script>
                  
              </div>
           <br /><br /> 
            
            <?php
			if(empty($_GET['do']) && empty($_GET['image_id']) && empty($_POST['v_edit'])) {
			// START DISPLAY ADD FORM
			?>
            <a name="New"></a>
            <div id="box">
            <h3>Add New </h3>
                <form name="frmAddimages" id="form" action="" method="post" enctype="multipart/form-data" >
                      <fieldset id="personal">
                        <legend>ENTER HOME INFORMATION</legend>
  
                       <strong>Description :</strong> 
                       <br />
                       <textarea  name="title"  id="title" ></textarea>

<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'title',
	{   
	filebrowserBrowseUrl : 'includes/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : 'includes/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : 'includes/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	enterMode : Number(2),
	uiColor: '#AEAEAE',
	
		extraPlugins : 'uicolor',
		toolbar : [ ['Source','-','Preview','-'],  ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'Scayt'], ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['-'], ['Maximize'] ]
	});	
</script> 
                       
                       <br /><br /> 
						<label for="image">Image : </label>
                        <input name="image" id="image" type="file" title="Upload Image" style="cursor:help"/>
                         <br />
                         <b style="margin-left:160px;">(Select only jpg, jpeg, gif, png images and image dimensions shoud be 1980 x 1080) </b>
                        <br /><br />
          
                  <div align="center">
           		      <input type="hidden" name="image_add" value="Y" />
              		  <input id="button1" type="submit" value="Add" /> 
                      <input id="button2" type="reset" tabindex="11"/>
                  </div>
                    
                    </form>
                    </div>
                    
                    
                    <?php 
						} //END DISLPAY ADD FORM
						
					elseif(!empty($_GET['do']) && $_GET['do'] == 'vedit' && !empty($_GET['image_id'])) {
					// START DISPLAY EDIT FORM 
					$ers  = @mysql_query("SELECT * FROM home_image WHERE image_id = {$_GET['image_id']}") or die('');
					if(mysql_num_rows($ers) > 0) { 
					while($erw = mysql_fetch_array($ers)) { 
					$image_id = $erw['image_id'];
					$title =  stripslashes($erw['title']);
					$image = $erw['image'];
										} // end while 
					} // end rec count if
					else print "<script>alert('Access Denied!!'); location = 'home.php';</script>";			
					  
					?>
                    <a name="ES"></a>
                    <div id="box">
            <h3>Update </h3>
                <form name="frmEditimage" id="form" action="home.php" method="post" enctype="multipart/form-data" onsubmit="return __val(this)">
                      <fieldset id="personal">
                        <legend>UPDATE INFORMATION</legend>
                        
                       <strong>Description :</strong> 
                       <br />
                       <textarea  name="title"  id="title" ><?=$title;?></textarea>
<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'title',
	{   
	filebrowserBrowseUrl : 'includes/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : 'includes/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : 'includes/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	enterMode : Number(2),
	uiColor: '#AEAEAE',
	
		extraPlugins : 'uicolor',
		toolbar : [ ['Source','-','Preview','-'],  ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'Scayt'], ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['-'], ['Maximize'] ]
	});	
</script> 
                       <br /><br />
						<label for="image">Image : </label>
                        <input name="image" id="image" type="file" title="Upload Image" style="cursor:help"/>
                        <br />
                        <div style="margin-left:160px;">
							<img src="image.php?src=<?=$image;?>&x=100&f=0" border=1 align="top"/>                                   
                         <br />
                         <b>(Select only jpg, jpeg, gif, png images and image dimensions shoud be 1980 x 1080) </b>
                          <br />
 
                                  <b>Select image files only if you want to change the existing one or not any image are there. </b>
                          </div>                        
                        <br />
                                               
                      <div align="center">
                          <input type="hidden" name="v_edit" value="Y" />
                          <input type="hidden" name="image_id" value="<?=$image_id;?>" />
                          <input id="button1" type="submit" value="Update" tabindex="10"/> 
                        <input id="button2" type="button"  value="Cancel & Go Back" tabindex="11" onclick="location='home.php';" align="top"/>
                      </div>
                      </fieldset>
                     
                     
                    
                    </form>
                    </div>
                    <?php 
					
					} 		// END DISPLAY EDIT FORM 
					
				  if(!empty($_POST['v_edit'])  && !empty($_POST['image_id']) && $_POST['v_edit'] == 'Y') 			                  
				  { 
					
				// START UPDATE DATABASE
				
				
				$image_id = $_REQUEST['image_id'];
				$title = addslashes($_POST['title']);
								
				$image = (!empty($_FILES['image']['name'])) ? time().$_FILES['image']['name'] : 'no-image';
				
				
				$image_q = ""; 
				$f2 = 0;
				if($image != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($image) == true)
						{
				
							$p1 = $img_dir."".$image;
							
							$sql="Select image from home_image where image_id='".$_POST['image_id']."' ";
							$rs=mysql_query($sql);
							$row=mysql_fetch_array($rs);
							
							$p2 = $img_dir."".$row['image'];
							if(file_exists($p2))
							{
								unlink($p2);
							}
							
							move_uploaded_file($_FILES['image']['tmp_name'], $p1);
							$image_q = ", image = '$image'";
							
							$f2 = 1;
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
							
				}
				else
				{
					$f2 = 1;
				}
						if($f2 == 1)
						 {
					
							$update_q = "UPDATE home_image SET title =  '$title'".$image_q." WHERE image_id = {$_POST['image_id']}"; 
							
							if(@mysql_query($update_q)) print "<script>alert('image updated successfully!'); location = 'home.php';</script>";
							else print "<script>alert('An error occured while processing your request!! Please try again later.'); location = 'home.php';</script>";
						 }
						 else
						 {
							 print "<font color='red'>You have tried invalied image files. Please select correct file!</font>";	
						 }
				
					// END UPDATE DATABASE 
					}
					
					?>
                    
                    
                    
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