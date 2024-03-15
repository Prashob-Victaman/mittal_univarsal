<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
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
document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
   
   
 function __val(_frm) { 
_err = "";
pro_name = _frm.pro_name.value; 

if(!pro_name) _err += "> Please enter content. \n";
if(_err) { alert(_err); return false; } else return true;
}

 
function _DelConfirm(url) { 
var c = confirm("Are you sure to delete this content! \n\n To proceed press \'Ok\' Or press \'Cancel\' to stay the entry");
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
  
  
function setSelect(listElement, listValue)
{
	for (i=0; i < listElement.options.length; i++) {
		if (listElement.options[i].value == listValue)	{
			listElement.selectedIndex = i;
		}
	}	
}
 

   
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

</head>

<body>
	<div id="container">
    	<div id="header">
        	<?php include($admin_includes."head_top.php"); 
				  include($admin_includes."Pager/Pager.php");
			?>
            
    <div id="topmenu">
            	<?php $_GET['tab'] = 2; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <li><a href="home.php" class="report"><strong>Manage Contents</strong></a></li>
                    <li><a href="home_images.php" class="report">Manage Images</a></li>
                    
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
               <div id="box">
                    <h3>MANAGE CONTENTS</h3>                                                   
                	<?php
					// DELETE USERS -- CUSTOMERS && PROVIDERS
					if(!empty($_GET['do']) && !empty($_GET['cid']) && $_GET['do'] == 'del') 
					{ 
						$q = "DELETE FROM home_contents WHERE cid = {$_GET['cid']} LIMIT 1";  
						if(mysql_query($q))   
							print "<script>alert('Content deleted successfully!'); location='home.php';</script>";
						else 
						{ 
							session_destroy(); print "<script>alert('Fatal Error!! For security reasons, we are logging you out!'); location='home.php';</script>"; 
						}
					}	
					//END DELETE USERS	
					
					//Delete multiple User
						if(isset($_POST['action']) && $_POST['action']=="Delete")
						{
						  foreach($_POST['chk'] as $key)
						  {
								mysql_query("delete from home_contents where cid=".$key);
						  }
						  echo '<script> location="home.php";</script>';
						}
					//Delete multiple User

			
				// START INSERTING DATA TO DB
				if(isset($_POST['image_add']) && !empty($_POST['image_add']) && $_POST['image_add'] == "Y" && $_POST['content']) 
				{ 
					$content = addslashes($_POST['content']);
					
				   $q = "INSERT INTO home_contents(content) VALUES('$content')"; 		
						//echo $q ; exit;
							
						if(@mysql_query($q)) print "<script>alert('Content added succesfuly!'); window.location = 'home.php' </script>";	
						else print "<font color='red'>An error occured while trying to process your request. Please try again later!</font>";	
				}	
				// END INSERTING DATA TO DB
				
				?>
                	<form name="form1" id="form1" method="post"> 
                  <table width="100%" >
						<thead>
							<tr>
							  <th width="10"><input type="checkbox" name="chk" id="chk" onclick="check(this.form.chk)" value=""/></th>
							  <th><a href="#">Contents</a></th>
                              <th width="100"><a href="#">Action</a></th>
                          </tr>
						</thead>
						<tbody>
							
<?php 

// get the pager input values
  $page = (!empty($_GET['p'])) ? $_GET['p'] : '';
  
  $limit = (!empty($_SESSION['limit'])) ? $_SESSION['limit'] : 10; // set the max data each page
  $result = mysql_query("SELECT count(*) as cnt FROM home_contents");
  $total = mysql_result($result, 0, "cnt");
  $fdir = $_SERVER['PHP_SELF']; 
  $pager  = Pager::getPagerData($total, $limit, $page);
  $offset = $pager->offset;
  $limit  = $pager->limit;
  $page   = $pager->page; 
  if($total == 0) $offset = 0;
  
  $rs = mysql_query("SELECT * FROM home_contents ORDER BY content DESC LIMIT $offset, $limit");	
  
							if($total > 0) { 									
							while($rw = mysql_fetch_array($rs)) 
							{ 
								$content = (strlen($rw['content']) > 100) ? substr($rw['content'],0,100).".." : $rw['content'];
							?>
                            
                            <tr>
                              <td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $rw['cid'];?>" /></td>
                              <td><a href="home.php?do=vedit&cid=<?=$rw['cid'];?>"><?=$content;?></a></td>
                                <td align="center">
                                 <a href="home.php?do=vedit&cid=<?=$rw['cid'];?>#ES">Edit</a> <b>&nbsp;|&nbsp;</b>
                                 <a href="javascript:;" onclick="_DelConfirm('home.php?do=del&cid=<?=$rw['cid'];?>');">Delete</a>
                               </td>
                            </tr>
							<? }  // end while
								} // end rec counf if
								else print "<tr><td colspan=7 align='center'>No projects exist! Please add to list here.</td></tr>";
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
						$u = (!empty($_GET['hotel_Id'])) ? 'home.php?hotel_Id='.$_GET['hotel_Id'].'&' : 'home.php?';
                        if ($page == 1) { print "<img src='img/icons/arrow_left.gif' width=16 height=16 border=0/>";  } else { 
						print "<a href=\"".$u."p=".($page-1)."\"><img src='img/icons/arrow_left.gif' width=16 height=16 border=0/></a>"; }
						echo "<input  value='$page' type='text' name='page' id='page' style='width:25px;'/>";
						if ($page == $pager->numPages)  print "<img src='img/icons/arrow_right.gif' width=16 height=16 border=0 />";  else  
						print "<a href=\"".$u."p=".($page + 1)."\"><img src='img/icons/arrow_right.gif' width=16 height=16 border=0 /></a>"; 
						print " of $pager->numPages &nbsp; "; 
						print "<select name='limit' id='limit' onchange='__limit(this[this.selectedIndex].value);'><option value='10' selected='selected'>10</option><option value='20'>20</option><option value='50'>50</option><option value='100'>100</option><option value='150'>150</option><option value='200'>200</option><option value='250'>250</option></select> per page | Total <strong>$total</strong> records found";
?>               
                        
</center>
 </div>				
						
<script>
setSelect(document.getElementById('limit'), <?=!empty($_SESSION['limit'])?$_SESSION['limit']:'10';?>);
</script>
                  
                </div>
           <br /><br /> 
            
            <?php
			if(empty($_GET['do']) && empty($_GET['cid']) && empty($_POST['v_edit'])) {
			// START DISPLAY ADD FORM
			?>
            <a name="New"></a>
            <div id="box">
            <h3><a name="addads"></a>Add Contents</h3>
                <form name="frmAddAds" id="form" action="" method="post" enctype="multipart/form-data" onsubmit="return __val(this);">
			      <a name="add"></a>
                      <fieldset id="personal">
           			 <legend>ENTER NEW CONTENT INFORMATION </legend>
  
                        <br />
  
                       
                       <strong>Description :</strong> 
                       <br />
                       <textarea  name="content"  id="contents" tabindex="7"></textarea>

<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'contents',
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
                        
          
                  <div align="center">
           		      <input type="hidden" name="image_add" value="Y" />
              		  <input id="button1" type="submit" value="Add Content" /> 
                      <input id="button2" type="reset" tabindex="11"/>
                  </div>
                    
                    </form>
                    </div>
                    
                    
                    <?php 
						} //END DISLPAY ADD FORM
						
					elseif(!empty($_GET['do']) && $_GET['do'] == 'vedit' && !empty($_GET['cid'])) {
					// START DISPLAY EDIT FORM 
					$ers  = @mysql_query("SELECT * FROM home_contents WHERE cid = {$_GET['cid']}") or die('');
					if(mysql_num_rows($ers) > 0) { 
					while($erw = mysql_fetch_array($ers)) { 
					$cid = $erw['cid'];
					$content = stripslashes($erw['content']);
					
										} // end while 
					} // end rec count if
					else print "<script>alert('Access Denied!!'); location = 'home.php';</script>";			
					  
					?>
                    <a name="ES"></a>
                    <div id="box">
                  <h3>Update Contents</h3>
                      <form name="frmEditimage" id="form" action="home.php" method="post" enctype="multipart/form-data" onsubmit="return __val(this)">
                      <fieldset id="personal">
                        <legend>UPDATE CONTENT'S INFORMATION</legend>
                       <br />
                       
                       <strong>Description :</strong> 
                       <br />
                       <textarea  name="content"  id="contents" tabindex="7"><?=$content;?></textarea>

<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'contents',
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
                                               
                      <div align="center">
                          <input type="hidden" name="v_edit" value="Y" />
                          <input type="hidden" name="cid" value="<?=$cid;?>" />
                          <input id="button1" type="submit" value="Update Content" tabindex="10"/> 
                        <input id="button2" type="button"  value="Cancel & Go Back" tabindex="11" onclick="location='home.php';" align="top"/>
                      </div>
                      </fieldset>
                    
                    </form>
                    </div>
                    <?php 
					
					} 		// END DISPLAY EDIT FORM 
					
				  if(!empty($_POST['v_edit'])  && !empty($_POST['cid']) && $_POST['v_edit'] == 'Y' && $_POST['content']!="") 			                 
				  { 
					
				// START UPDATE DATABASE
				$cid = $_REQUEST['cid'];
				$content = addslashes($_POST['content']);
				
				$update_q = "UPDATE home_contents SET  content = '$content' WHERE cid = {$_POST['cid']}";   
				
				if(@mysql_query($update_q)) print "<script>alert('Content updated successfully!'); location = 'home.php';</script>";
				else print "<script>alert('An error occured while processing your request!! Please try again later.'); location = 'home.php';</script>";
			// END UPDATE DATABASE 
			}
					
	?>
                  </div>
            </div>
            <div id="sidebar">
  		<?php include($admin_includes."right_nav_bar.php"); ?>     
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
            <li><a href="javascript: document.cookie='theme=5'; window.location.reload();" title="Mix" id="defswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
<?php
}
else header("location:login.php"); ?>