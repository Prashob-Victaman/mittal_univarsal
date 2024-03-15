<?php

session_start();
header("Cache-Control: no-cache, must-revalidate");
include("config.php");
if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) { 
if(!empty($_GET['show'])) $_SESSION['limit'] =  $_GET['show'];

$cat = (isset($_REQUEST['cat']) && !empty($_REQUEST['cat'])) ? $_REQUEST['cat'] : '';

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
city_id = _frm.city_id.value;
cat = _frm.cat.value;  
sub_cat = _frm.sub_cat.value; 
pro_name = _frm.pro_name.value; 
pro_area = _frm.pro_area.value; 


if(!city_id) _err += "> Please select Project city. \n";
if(!cat) _err += "> Please select category. \n";
if(!sub_cat) _err += "> Please select project sub category. \n";
if(!pro_name) _err += "> Please enter project name. \n";
if(!pro_area) _err += "> Please enter project area. \n";
if(_err) { alert(_err); return false; } else return true;
}

 
function _DelConfirm(url) { 
var c = confirm("Are you sure to delete this project! \n\n To proceed press \'Ok\' Or press \'Cancel\' to stay the entry");
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
  
function _FilterProjectCat(_id) {
if(_id != '-- Select a Project Category to Filter --') location.href = "?cat="+_id;
else location.href = "index.php";
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
            	<?php $_GET['tab'] = 1; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <li><a href="index.php#add" class="report"><strong>Add New</strong></a></li>
                    
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
               <div id="box">
                    <h3>MANAGE PROJECTS</h3>                                                   
                    <p align="right" style="height:16px; margin-right:07px; z-index:-10000;">
                    
                    <select style="font-size:11px;" onchange="_FilterProjectCat(this[this.options.selectedIndex].value);" id='fl_opt'>		                        <option selected="selected">-- Select a Project Category to Filter --</option>
                      <option value='Commercial' <?php if(isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Commercial') echo "selected"; ?>>Commercial</option>
                      <option value='Residential' <?php if(isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Residential') echo "selected"; ?>>Residential</option>
                      <option value='Hospitality' <?php if(isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Hospitality') echo "selected"; ?>>Hospitality</option>
                      <option value='Township' <?php if(isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Township') echo "selected"; ?>>Township</option>
                  </select>
                   
				   
			     </p>
                	<?php
					// DELETE USERS -- CUSTOMERS && PROVIDERS
					if(!empty($_GET['do']) && !empty($_GET['pid']) && $_GET['do'] == 'del') 
					{ 
						$sql="Select floor_plan,floor_plan2,floor_plan3,floor_plan4,floor_plan5, map, brochure from project where pid='".$_GET['pid']."'";
						$rs=mysql_query($sql);
						$row=mysql_fetch_array($rs);                     //Delete Floor plan, map, broshure.
						
						$p1 = $img_dir."".$row['floor_plan']; 
						$f2 = $img_dir."".$row['floor_plan2'];  
						$f3 = $img_dir."".$row['floor_plan3']; 
						$f4 = $img_dir."".$row['floor_plan4']; 
						$f5 = $img_dir."".$row['floor_plan5']; 
						$f6 = $img_dir."".$row['floor_plan6']; 
						$f7 = $img_dir."".$row['floor_plan7']; 
						$f8 = $img_dir."".$row['floor_plan8']; 
                                                
						$p2 = $img_dir."".$row['map'];
						$p3 = $pdf_dir."".$row['brochure'];
						
						if(file_exists($p1)){unlink($p1);}
						if(file_exists($f2)){unlink($f2);}
						if(file_exists($f3)){unlink($f3);}
						if(file_exists($f4)){unlink($f4);}
						if(file_exists($f5)){unlink($f5);}
						if(file_exists($f6)){unlink($f6);}
						if(file_exists($f7)){unlink($f7);}
						if(file_exists($f8)){unlink($f8);}
                                                
                                                
						if(file_exists($p2)){unlink($p2);}
						if(file_exists($p3)){unlink($p3);}
						
						$q_image=mysql_query("Select image from image where pid='".$_GET['pid']."'"); //Delete from Images
						while($row_image = mysql_fetch_array($q_image))
						{
							$i1 = $img_dir."".$row_image['image'];
							if(file_exists($i1))
							{
								unlink($i1);
							}
						}
					    
                                                $q_image_del = mysql_query("DELETE FROM image WHERE pid = {$_GET['pid']} ");  //Delete from Images
						
						$q = "DELETE FROM project WHERE pid = {$_GET['pid']} LIMIT 1";  
						if(mysql_query($q))   
							print "<script>alert('Project deleted successfully!'); location='index.php';</script>";
						else 
						{ 
							session_destroy(); 
							print "<script>alert('Fatal Error!! For security reasons, we are logging you out!'); location='index.php';</script>"; 
						}
                                                
					}	
					//END DELETE USERS	
					
					//Delete multiple User
						if(isset($_POST['action']) && $_POST['action']=="Delete")
						{
						  foreach($_POST['chk'] as $key)
						  {
								$sql="Select floor_plan,floor_plan2,floor_plan3,floor_plan4,floor_plan5, map, brochure from project where pid='".$key."'";
								$rs=mysql_query($sql);
								$row=mysql_fetch_array($rs);
								
								$p1 = $img_dir."".$row['floor_plan'];
								$f2 = $img_dir."".$row['floor_plan2']; 
								$f3 = $img_dir."".$row['floor_plan3']; 
								$f4 = $img_dir."".$row['floor_plan4']; 
								$f5 = $img_dir."".$row['floor_plan5']; 
								$f6 = $img_dir."".$row['floor_plan6']; 
								$f7 = $img_dir."".$row['floor_plan7']; 
								$f8 = $img_dir."".$row['floor_plan8']; 
                                                                
								$p2 = $img_dir."".$row['map'];
								$p3 = $pdf_dir."".$row['brochure'];
								
								if(file_exists($p1)){unlink($p1);}
								if(file_exists($f2)){unlink($f2);}
								if(file_exists($f3)){unlink($f3);}
								if(file_exists($f4)){unlink($f4);}
								if(file_exists($f5)){unlink($f5);}
								if(file_exists($f6)){unlink($f6);}
								if(file_exists($f7)){unlink($f7);}
								if(file_exists($f8)){unlink($f8);}
                                                                
                                                                
                                                                
								if(file_exists($p2)){unlink($p2);}
								if(file_exists($p3)){unlink($p3);}
							 	
								$q_image=mysql_query("Select image from image where pid='".$key."'"); //Delete from Images
								while($row_image = mysql_fetch_array($q_image))
								{
									$i1 = $img_dir."".$row_image['image'];
									if(file_exists($i1))
									{
										unlink($i1);
									}
								}
								$q_image_del = mysql_query("DELETE FROM image WHERE pid = {$key} ");  //Delete from Images
								
								
								mysql_query("delete from project where pid=".$key);
						  }
						  echo '<script> location="index.php";</script>';
						}
					//Delete multiple User

			
				// START INSERTING DATA TO DB
				if(isset($_POST['image_add']) && !empty($_POST['image_add']) && $_POST['image_add'] == "Y") 
				{ 
				
					$cr_date = date("Y-m-d H:i:s");
					$cr_user = $_SESSION['uname'];
					$cr_ip = $_SERVER['REMOTE_ADDR'];
					
					$cat = $_POST['cat'];
                                        
                                        if ($cat=="Residential"){$ord=1;} 
                                        if ($cat=="Commercial") {$ord=2;}
                                        if ($cat=="Township")   {$ord=3;}
                                        if ($cat=="Hospitality"){$ord=4;}


					$sub_cat = $_POST['sub_cat'];
					$pro_area = $_POST['pro_area'];
					$pro_name = $_POST['pro_name'];
					$pro_desc = addslashes($_POST['pro_desc']);
					$city_id = $_POST['city_id'];
					
				    
                                    $floor_plan = (!empty($_FILES['floor_plan']['name'])) ? time().$_FILES['floor_plan']['name'] : 'no-image';
				    $floor_plan2 = (!empty($_FILES['floor_plan2']['name'])) ? time().$_FILES['floor_plan2']['name'] : 'no-image';
				    $floor_plan3 = (!empty($_FILES['floor_plan3']['name'])) ? time().$_FILES['floor_plan3']['name'] : 'no-image';
				    $floor_plan4 = (!empty($_FILES['floor_plan4']['name'])) ? time().$_FILES['floor_plan4']['name'] : 'no-image';
				    $floor_plan5 = (!empty($_FILES['floor_plan5']['name'])) ? time().$_FILES['floor_plan5']['name'] : 'no-image';
				    
                                    $floor_plan6 = (!empty($_FILES['floor_plan6']['name'])) ? time().$_FILES['floor_plan6']['name'] : 'no-image';
				    $floor_plan7 = (!empty($_FILES['floor_plan7']['name'])) ? time().$_FILES['floor_plan7']['name'] : 'no-image';
				    $floor_plan8 = (!empty($_FILES['floor_plan8']['name'])) ? time().$_FILES['floor_plan8']['name'] : 'no-image';
                                    
                                    
				    $map = (!empty($_FILES['map']['name'])) ? time().$_FILES['map']['name'] : 'no-image';
				    $brochure = (!empty($_FILES['brochure']['name'])) ? time().$_FILES['brochure']['name'] : 'no-image';
					
					if($floor_plan != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan) == true)
						{
							$p1 = $img_dir."".$floor_plan;
							move_uploaded_file($_FILES['floor_plan']['tmp_name'], $p1);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
					
					if($floor_plan2 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan2) == true)
						{
							$f2 = $img_dir."".$floor_plan2;
							move_uploaded_file($_FILES['floor_plan2']['tmp_name'], $f2);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
					
					if($floor_plan3 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan3) == true)
						{
							$f3 = $img_dir."".$floor_plan3;
							move_uploaded_file($_FILES['floor_plan3']['tmp_name'], $f3);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
					
					if($floor_plan4 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan4) == true)
						{
							$f4 = $img_dir."".$floor_plan4;
							move_uploaded_file($_FILES['floor_plan4']['tmp_name'], $f4);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
					
					
                                        if($floor_plan5 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan5) == true)
						{
							$f5 = $img_dir."".$floor_plan5;
							move_uploaded_file($_FILES['floor_plan5']['tmp_name'], $f5);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
                                        
                                           if($floor_plan6 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan6) == true)
						{
							$f6 = $img_dir."".$floor_plan6;
							move_uploaded_file($_FILES['floor_plan6']['tmp_name'], $f6);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
                                        
                                           if($floor_plan7 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan7) == true)
						{
							$f7 = $img_dir."".$floor_plan7;
							move_uploaded_file($_FILES['floor_plan7']['tmp_name'], $f7);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
                                        
                                                if($floor_plan8 != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan8) == true)
						{
							$f8 = $img_dir."".$floor_plan8;
							move_uploaded_file($_FILES['floor_plan8']['tmp_name'], $f8);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in floor plan.")</script>';
						}
							
					}
                                        
					
					if($map != 'no-image') 
					{
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($map) == true)
						{
							$p2 = $img_dir."".$map;
							move_uploaded_file($_FILES['map']['tmp_name'], $p2);
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed in map.")</script>';
						}
							
					}
					
					if($brochure != 'no-image') 
					{
						$allowedExtensions = array("pdf","rtf");
						if(check_file_ext($brochure) == true)
						{
							$p1 = $pdf_dir."".$brochure;
							move_uploaded_file($_FILES['brochure']['tmp_name'], $p1);
						}	
						else
						{
							echo '<script>alert("Only pdf,rtf are allowed in brochure.")</script>';
						}
							
					}
					
								
						$q = "INSERT INTO project(ord,cat, sub_cat, pro_area, pro_name, pro_desc,floor_plan,floor_plan2,floor_plan3,floor_plan4,floor_plan5,floor_plan6,floor_plan7,floor_plan8,map, brochure, cr_date, cr_user, cr_ip, published, city_id) VALUES('$ord','$cat','$sub_cat','$pro_area', '$pro_name','$pro_desc','$floor_plan','$floor_plan2','$floor_plan3','$floor_plan4','$floor_plan5','$floor_plan6','$floor_plan7','$floor_plan8','$map','$brochure','$cr_date','$cr_user','$cr_ip','Y',$city_id)"; 		
						//echo $q ; exit;
							
						if(@mysql_query($q)) print "<script>alert('Project added succesfuly!'); window.location = 'index.php' </script>";	
						else print "<font color='red'>An error occured while trying to process your request. Please try again later!</font>";	
				}	
				// END INSERTING DATA TO DB
				
				?>
                	<form name="form1" id="form1" method="post"> 
                    <table width="100%" >
						<thead>
							<tr>
							  <th width="10"><input type="checkbox" name="chk" id="chk" onclick="check(this.form.chk)" value=""/></th>
							  <th><a href="#">Project Title</a></th>
                              <th ><a href="#">Category</a></th>
                              <th ><a href="#">Sub Category</a></th>
                              <th ><a href="#">City</a></th>
                              <th width="140"><a href="#">Action</a></th>
                          </tr>
						</thead>
						<tbody>
							
<?php 
$wer = ' ';				
if(!empty($_GET['cat']) && $_GET['cat']!='')  $wer = " WHERE cat = '".$_GET['cat']."' " ;							

// get the pager input values
  $page = (!empty($_GET['p'])) ? $_GET['p'] : '';
  
  $limit = (!empty($_SESSION['limit'])) ? $_SESSION['limit'] : 10; // set the max data each page
  $result = mysql_query("SELECT count(*) as cnt FROM project $wer");
  $total = mysql_result($result, 0, "cnt");
  $fdir = $_SERVER['PHP_SELF']; 
  $pager  = Pager::getPagerData($total, $limit, $page);
  $offset = $pager->offset;
  $limit  = $pager->limit;
  $page   = $pager->page; 
  if($total == 0) $offset = 0;
  
  $rs = mysql_query("SELECT * FROM project $wer ORDER BY cr_date DESC LIMIT $offset, $limit");	
  
							if($total > 0) { 									
							while($rw = mysql_fetch_array($rs)) 
							{ 
								$pro_name = (strlen($rw['pro_name']) > 20) ? substr($rw['pro_name'],0,20).".." : $rw['pro_name'];
								$cat = $rw['cat'];	
								$sub_cat = $rw['sub_cat'];	
								$crdate = date("M d, Y",strtotime($rw['cr_date']));
							
							    $cityname = "";
							if($rw['city_id']!="")
							{	
							  $city_query=mysql_query("select city_name from city where city_id=".$rw['city_id']);
							  while($fetch=mysql_fetch_assoc($city_query))
							  {
							   $cityname=$fetch['city_name'];
							  }
							}
							?>
                            
                            <tr>
                              <td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $rw['pid'];?>" /></td>
                              <td><a href="index.php?do=vedit&pid=<?=$rw['pid'];?>"><?=$pro_name;?></a></td>
                                <td><?=$cat;?></td>
                                <td><?=$sub_cat;?></td>
                                <td><?=$cityname;?></td>
                                <td align="center">
                                 <a href="images.php?pid=<?=$rw['pid'];?>">Images</a> <b>&nbsp;|&nbsp;</b>
                                 <a href="index.php?do=vedit&pid=<?=$rw['pid'];?>#ES">Edit</a> <b>&nbsp;|&nbsp;</b>
                                 <a href="javascript:;" onclick="_DelConfirm('index.php?do=del&pid=<?=$rw['pid'];?>');">Delete</a>
                               </td>
                            </tr>
							<? }  // end while
								} // end rec counf if
								else print "<tr><td colspan=7 align='center'>No projects exist! Please add to list here.</td></tr>";
							?>
						</tbody>
					</table>
                  Â  <input type="button" name="delete" value="Delete Multiple" onclick="javascript:delcheck();" style="color:#F25; height:22px;  border:#fff dotted 2px;"/>
                    <input type="hidden" name="action" value="Delete" />
            </form>        
         
<script>
function __limit(_val) {
<? if(empty($_GET['cat']) && empty($_GET['p'])) { ?>  
location = 'index.php?show='+_val;
<? } else { ?>
location = 'index.php?<?=$_SERVER['QUERY_STRING'];?>&show='+_val;
<? } ?> 
}
</script>
                    	
		    <div id="pager">
            <center>
                    	
         <?php
						$u = (!empty($_GET['hotel_Id'])) ? 'index.php?hotel_Id='.$_GET['hotel_Id'].'&' : 'index.php?';
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
			if(empty($_GET['do']) && empty($_GET['pid']) && empty($_POST['v_edit'])) {
			// START DISPLAY ADD FORM
			?>
            <a name="New"></a>
            <div id="box">
            <h3><a name="addads"></a>Add Projects</h3>
                <form name="frmAddAds" id="form" action="" method="post" enctype="multipart/form-data" onsubmit="return __val(this);">
			      <a name="add"></a>
                      <fieldset id="personal">
                        <legend>ENTER NEW PROJECT INFORMATION </legend>
                        <label for="cat">Project City : </label> 
                        <select name="city_id" style="width:408px; margin-left:0px; padding-left:0px;">
						   <option value="" selected>Select a City </option>
							<?php
							$cityquery=mysql_query("select * from city order by lstOrder asc");
							while($row=mysql_fetch_assoc($cityquery))
							{
							?>
                            <option value="<?=$row['city_id']?>"><?=$row['city_name']?></option>                        	
                            <?php
							}
							?>
                        </select>
                        
                        <br /><br />
                        
                        <label for="cat">Project Category : </label> 
                        <select name="cat" style="width:408px; margin-left:0px; padding-left:0px;">
						   <option value="" selected>Select a Category </option>
							<option value="Commercial">Commercial</option>                        	
                            <option value="Residential">Residential</option>
                            <option value="Hospitality">Hospitality</option>
                            <option value="Township">Township</option>
                        </select>
                        
                        <br /><br />
  
                        <label for="sub_cat">Project Sub Category :  </label> 
                        <select name="sub_cat" style="width:408px; margin-left:0px; padding-left:0px;">
						 <option value="" selected>Select a Sub Category</option>
							<option value="Upcoming">Upcoming</option>                        	
							<option value="Ongoing">Ongoing</option>                        	
							<option value="Complete">Complete</option>                        	
                        </select>
                        
                        <br /><br />
  
                        <label for="title">Project Name : </label> 
                        <input name="pro_name" id="pro_name" type="text" value=""/>
                       
                        <br /><br />
  
                        <label for="pro_area">Project Area : </label> 
                        <input name="pro_area" id="pro_area" type="text" value=""/>
                       
                       <br /><br /> 
                       
                       <strong>Project Description :</strong> 
                       <br />
                       <textarea  name="pro_desc"  id="pro_desc" tabindex="7"></textarea>

<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'pro_desc',
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

                     
                       <br />
                      <fieldset>
                        <legend>Floor Plans</legend> 
                        <label for="descr">Floor Plan 1 : </label> 
                        <input name="floor_plan" id="floor_plan" type="file"/>
                       
                       <br /> 
                       
                        <label for="descr">Floor Plan 2 : </label> 
                        <input name="floor_plan2" id="floor_plan2" type="file"/>
                       
                       <br />
                       
                        <label for="descr">Floor Plan 3 : </label> 
                        <input name="floor_plan3" id="floor_plan3" type="file"/>
                       <br />
                       
                        <label for="descr">Floor Plan 4 : </label> 
                        <input name="floor_plan4" id="floor_plan4" type="file"/>
                       <br />
                       
                        <label for="descr">Floor Plan 5 : </label> 
                        <input name="floor_plan5" id="floor_plan5" type="file"/>
                         <br />
                         <label for="descr">Floor Plan 6 : </label> 
                        <input name="floor_plan6" id="floor_plan6" type="file"/>
                         <br />
                         <label for="descr">Floor Plan 7 : </label> 
                        <input name="floor_plan7" id="floor_plan7" type="file"/>
                         <br />
                         <label for="descr">Floor Plan 8 : </label> 
                        <input name="floor_plan8" id="floor_plan8" type="file"/>
                        
                         <br />
                         <b style="margin-left:160px;">(Select only jpg, jpeg, gif, png images and image dimensions shoud be 390 x 446) </b>
                         </fieldset>
                       
                        <br />
                        <label for="descr">Map : </label> 
                        <input name="map" id="map" type="file"/>
                         <br />
                         <b style="margin-left:160px;">(Select only jpg, jpeg, gif, png images and image dimensions shoud be 390 x 446) </b>
                       
                        <br /><br /> 
                        <label for="descr">Ebrochure : </label> 
                        <input name="brochure" id="brochure" type="file"/>
                         <br />
                         <b style="margin-left:160px;">(Select only  pdf, rtf file) </b>
                       
                        <br /><br /> 
                        
          
                  <div align="center">
           		      <input type="hidden" name="image_add" value="Y" />
              		  <input id="button1" type="submit" value="Add Project" /> 
                      <input id="button2" type="reset" tabindex="11"/>
                  </div>
                    
                    </form>
                    </div>
                    
                    
                    <?php 
						} //END DISLPAY ADD FORM
						
					elseif(!empty($_GET['do']) && $_GET['do'] == 'vedit' && !empty($_GET['pid'])) {
					// START DISPLAY EDIT FORM 
					$ers  = @mysql_query("SELECT * FROM project WHERE pid = {$_GET['pid']}") or die('');
					if(mysql_num_rows($ers) > 0) { 
					while($erw = mysql_fetch_array($ers)) { 
					$pid = $erw['pid'];
					$city_id = $erw['city_id'];
					$cat = $erw['cat'];  
					$sub_cat = $erw['sub_cat'];
					$pro_name = $erw['pro_name'];
					$pro_area = $erw['pro_area'];
					$pro_desc = stripslashes($erw['pro_desc']);
					$floor_plan = $erw['floor_plan'];
					$floor_plan2 = $erw['floor_plan2'];
					$floor_plan3 = $erw['floor_plan3'];
					$floor_plan4 = $erw['floor_plan4'];
					$floor_plan5 = $erw['floor_plan5'];
					$floor_plan6 = $erw['floor_plan6'];
					$floor_plan7 = $erw['floor_plan7'];
					$floor_plan8 = $erw['floor_plan8'];
                                        
					$map = $erw['map'];
					$brochure = $erw['brochure'];
					
										} // end while 
					} // end rec count if
					else print "<script>alert('Access Denied!!'); location = 'index.php';</script>";			
					  
					?>
                    <a name="ES"></a>
                    <div id="box">
                  <h3>Update Projecs</h3>
                      <form name="frmEditimage" id="form" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return __val(this)">
                      <fieldset id="personal">
                        <legend>UPDATE PROJECT'S INFORMATION</legend>
                        <label for="cat">Project City : </label> 
                        <select name="city_id" style="width:408px; margin-left:0px; padding-left:0px;">
						   <option value="" selected>Select a City </option>
							<?php
							$cityquery=mysql_query("select * from city order by lstOrder asc");
							while($row=mysql_fetch_assoc($cityquery))
							{
							?>
                            <option value="<?=$row['city_id']?>" <?php if($city_id==$row['city_id']){?> selected="selected" <?php }?>><?=$row['city_name']?></option>                        	
                            <?php
							}
							?>
                        </select>
                        
                        <br /><br />
                        
                        <label for="cat">Project Category : </label> 
                        <select name="cat" style="width:408px; margin-left:0px; padding-left:0px;">
						   <option value="" >Select a Project Type </option>
							<option value="Commercial"  <?php if($cat == 'Commercial') echo "selected"; ?>>Commercial</option>                        	<option value="Residential" <?php if($cat == 'Residential') echo "selected"; ?>>Residential</option>
                            <option value="Hospitality" <?php if($cat == 'Hospitality') echo "selected"; ?>>Hospitality</option>
                          <option value="Township" <?php if($cat == 'Township') echo "selected"; ?>>Township</option>
                        </select>
                        
                        <br /><br />
  
                        <label for="sub_cat">Project Sub Category : </label> 
                        <select name="sub_cat" style="width:408px; margin-left:0px; padding-left:0px;">
				             <option value="" >Select a Project Sub Category </option>
                             <option value="Upcoming" <?php if($sub_cat == 'Upcoming') echo "selected"; ?>>Upcoming</option>                        	 <option value="Ongoing" <?php if($sub_cat == 'Ongoing') echo "selected"; ?>>Ongoing</option>             	
                             <option value="Complete" <?php if($sub_cat == 'Complete') echo "selected"; ?>>Complete</option>                        	
                        </select>
                        
                        
                        <br /><br />
  
                        <label for="title">Project Name : </label> 
                        <input name="pro_name" id="pro_name" type="text" value="<?=$pro_name;?>"/>
                       
                       <br /><br /> 
                       
                        <label for="title">Project Area : </label> 
                        <input name="pro_area" id="pro_area" type="text" value="<?=$pro_area;?>"/>
                       
                       <br /><br /> 
                       
                       <strong>Project Description :</strong> 
                       <br />
                       <textarea  name="pro_desc"  id="pro_desc" tabindex="7"><?=$pro_desc;?></textarea>

<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'pro_desc',
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
                       <fieldset>
                        <legend>Floor Plans</legend>
                       
                        <div>
                        <label for="descr">Floor Plan 1 : </label> 
                        <input name="floor_plan" id="floor_plan" type="file"/>
                        <img src="image.php?src=<?=$floor_plan;?>&x=100&f=0" border=1 align="top"/>
                         </div>
                         
                        <div> 
                        <label for="descr">Floor Plan 2 : </label> 
                        <input name="floor_plan2" id="floor_plan2" type="file"/>
                        <img src="image.php?src=<?=$floor_plan2;?>&x=100&f=0" border=1 align="top"/>
                        </div>
                        
                        <div>  
                        <label for="descr">Floor Plan 3 : </label> 
                        <input name="floor_plan3" id="floor_plan3" type="file"/>
						<img src="image.php?src=<?=$floor_plan3;?>&x=100&f=0" border=1 align="top"/>   
                        </div>                      
                        
                        <div>  
                        <label for="descr">Floor Plan 4 : </label> 
                        <input name="floor_plan4" id="floor_plan4" type="file"/>
						<img src="image.php?src=<?=$floor_plan4;?>&x=100&f=0" border=1 align="top"/>                        </div>      
                        
                        <div>  
                        <label for="descr">Floor Plan 5 : </label> 
                        <input name="floor_plan5" id="floor_plan5" type="file"/>
						<img src="image.php?src=<?=$floor_plan5;?>&x=100&f=0" border=1 align="top"/>                        </div>      
                          <div>  
                        <label for="descr">Floor Plan 6 : </label> 
                        <input name="floor_plan6" id="floor_plan6" type="file"/>
						<img src="image.php?src=<?=$floor_plan6;?>&x=100&f=0" border=1 align="top"/>  
                           <div>                       
                                                <label for="descr">Floor Plan 7 : </label> 
                        <input name="floor_plan7" id="floor_plan7" type="file"/>
						<img src="image.php?src=<?=$floor_plan7;?>&x=100&f=0" border=1 align="top"/>  
                          <div>                        
                                                <label for="descr">Floor Plan 8 : </label> 
                        <input name="floor_plan8" id="floor_plan8" type="file"/>
						<img src="image.php?src=<?=$floor_plan8;?>&x=100&f=0" border=1 align="top"/>  
                                                
                                                
                        <div style="margin-left:160px;">
                         <b>(Select only jpg, jpeg, gif, png images and image dimensions shoud be 390 x 446) </b>
                         <br />
                          <b>Select image files only if you want to change the existing one or not any image are there. </b>
                          </div> 
                        </fieldset>
                       
                        <br />
                        <label for="descr">Map : </label> 
                        <input name="map" id="map" type="file"/>
                         <img src="image.php?src=<?=$map;?>&x=100&f=0" border=1 align="top"/>                                   

                        <div style="margin-left:160px;">
                         <b>(Select only jpg, jpeg, gif, png images and image dimensions shoud be 390 x 446) </b>
                         <br />
                          <b>Select image files only if you want to change the existing one or not any image are there. </b>
                          </div> 
                       
                        <br />
                        <label for="descr">Ebrochure : </label> 
                        <input name="brochure" id="brochure" type="file"/>
                        <?php if($brochure != "no-image") {?>
							<a href="<?=$pdf_dir."/".$brochure;?>" target="_blank"/>View Ebrochure</a>      
                          <br />
						<?php }?>    
                        <div style="margin-left:160px;">
                         <b>(Select only  pdf, rtf file) </b>
                         <br />
                          <b>Select files only if you want to change the existing one or not any file are there. </b>
                          </div> 
                        <br /><br /> 
                                               
                      <div align="center">
                          <input type="hidden" name="v_edit" value="Y" />
                          <input type="hidden" name="pid" value="<?=$pid;?>" />
                          <input id="button1" type="submit" value="Update Project" tabindex="10"/> 
                        <input id="button2" type="button"  value="Cancel & Go Back" tabindex="11" onclick="location='index.php';" align="top"/>
                      </div>
                      </fieldset>
                    
                    </form>
                    </div>
                    <?php 
					
					} 		// END DISPLAY EDIT FORM 
					
				  if(!empty($_POST['v_edit'])  && !empty($_POST['pid']) && $_POST['v_edit'] == 'Y') 			                 
				  { 
					
				// START UPDATE DATABASE
				$pid = $_REQUEST['pid'];
				$upd_date = date("Y-m-d H:i:s");
				$upd_user = $_SESSION['uname'];
				$upd_ip = $_SERVER['REMOTE_ADDR'];
				
				$city_id = $_POST['city_id'];
				$cat = $_POST['cat'];
				$sub_cat = $_POST['sub_cat'];
				$pro_name = $_POST['pro_name'];
				$pro_area = $_POST['pro_area'];
				$pro_desc = addslashes($_POST['pro_desc']);
				
				$floor_plan = (!empty($_FILES['floor_plan']['name'])) ? time().$_FILES['floor_plan']['name'] : 'no-image';
				$floor_plan2 = (!empty($_FILES['floor_plan2']['name'])) ? time().$_FILES['floor_plan2']['name'] : 'no-image';
				$floor_plan3 = (!empty($_FILES['floor_plan3']['name'])) ? time().$_FILES['floor_plan3']['name'] : 'no-image';
				$floor_plan4 = (!empty($_FILES['floor_plan4']['name'])) ? time().$_FILES['floor_plan4']['name'] : 'no-image';
				$floor_plan5 = (!empty($_FILES['floor_plan5']['name'])) ? time().$_FILES['floor_plan5']['name'] : 'no-image';
				$floor_plan6 = (!empty($_FILES['floor_plan6']['name'])) ? time().$_FILES['floor_plan6']['name'] : 'no-image';
				$floor_plan7 = (!empty($_FILES['floor_plan7']['name'])) ? time().$_FILES['floor_plan7']['name'] : 'no-image';
				$floor_plan8 = (!empty($_FILES['floor_plan8']['name'])) ? time().$_FILES['floor_plan8']['name'] : 'no-image';
                                
				$map = (!empty($_FILES['map']['name'])) ? time().$_FILES['map']['name'] : 'no-image';
				$brochure = (!empty($_FILES['brochure']['name'])) ? time().$_FILES['brochure']['name'] : 'no-image';
				
				$sql="Select floor_plan,floor_plan2,floor_plan3,floor_plan4,floor_plan5, map, brochure from project where pid='".$_POST['pid']."'";
				$rs=mysql_query($sql);                      
				$row=mysql_fetch_array($rs);                                        //fatching floor plan, map, broushure
				
				$floor_plan_q = "";
				$floor_plan2_q = "";
				$floor_plan3_q = "";
				$floor_plan4_q = "";
				$floor_plan5_q = "";
				$floor_plan6_q = "";
				$floor_plan7_q = "";
				$floor_plan8_q = "";
                                
                                
				$map_q = "";
				$brochure_q = "";
				
				if($floor_plan != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan) == true)
						{
								$f1 = $img_dir."".$floor_plan;
								$f2 = $img_dir."".$row['floor_plan'];
								if(file_exists($f2))
								{
									unlink($f2);
								}
								
								move_uploaded_file($_FILES['floor_plan']['tmp_name'], $f1);
								$floor_plan_q = ", floor_plan = '$floor_plan'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				
				if($floor_plan2 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan2) == true)
						{
								$f21 = $img_dir."".$floor_plan2;
								$f22 = $img_dir."".$row['floor_plan2'];
								if(file_exists($f22))
								{
									unlink($f22);
								}
								
								move_uploaded_file($_FILES['floor_plan2']['tmp_name'], $f21);
								$floor_plan2_q = ", floor_plan2 = '$floor_plan2'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				
				if($floor_plan3 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan3) == true)
						{
								$f31 = $img_dir."".$floor_plan3;
								$f32 = $img_dir."".$row['floor_plan3'];
								if(file_exists($f32))
								{
									unlink($f32);
								}
								
								move_uploaded_file($_FILES['floor_plan3']['tmp_name'], $f31);
								$floor_plan3_q = ", floor_plan3 = '$floor_plan3'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				
				if($floor_plan4 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan4) == true)
						{
								$f41 = $img_dir."".$floor_plan4;
								$f42 = $img_dir."".$row['floor_plan4'];
								if(file_exists($f42))
								{
									unlink($f42);
								}
								
								move_uploaded_file($_FILES['floor_plan4']['tmp_name'], $f41);
								$floor_plan4_q = ", floor_plan4 = '$floor_plan4'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				
				if($floor_plan5 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan5) == true)
						{
								$f51 = $img_dir."".$floor_plan5;
								$f52 = $img_dir."".$row['floor_plan5'];
								if(file_exists($f52))
								{
									unlink($f52);
								}
								
								move_uploaded_file($_FILES['floor_plan5']['tmp_name'], $f51);
								$floor_plan5_q = ", floor_plan5 = '$floor_plan5'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
                                
                                if($floor_plan6 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan6) == true)
						{
								$f61 = $img_dir."".$floor_plan6;
								$f62 = $img_dir."".$row['floor_plan6'];
								if(file_exists($f62))
								{
									unlink($f62);
								}
								
								move_uploaded_file($_FILES['floor_plan6']['tmp_name'], $f61);
								$floor_plan6_q = ", floor_plan6 = '$floor_plan6'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
                                         if($floor_plan7 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan7) == true)
						{
								$f71 = $img_dir."".$floor_plan7;
								$f72 = $img_dir."".$row['floor_plan7'];
								if(file_exists($f72))
								{
									unlink($f72);
								}
								
								move_uploaded_file($_FILES['floor_plan7']['tmp_name'], $f71);
								$floor_plan7_q = ", floor_plan7 = '$floor_plan7'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
                                
                                               if($floor_plan8 != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($floor_plan8) == true)
						{
								$f81 = $img_dir."".$floor_plan8;
								$f82 = $img_dir."".$row['floor_plan8'];
								if(file_exists($f82))
								{
									unlink($f82);
								}
								
								move_uploaded_file($_FILES['floor_plan8']['tmp_name'], $f81);
								$floor_plan8_q = ", floor_plan8 = '$floor_plan8'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				if($map != 'no-image') 
				{ 
						$allowedExtensions = array("jpg","png","jpeg","gif");
						if(check_file_ext($map) == true)
						{
								$m1 = $img_dir."".$map;
								$m2 = $img_dir."".$row['map'];
								if(file_exists($m2))
								{
									unlink($m2);
								}
								
								move_uploaded_file($_FILES['map']['tmp_name'], $m1);
								$map_q = ", map = '$map'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
						}
				}
				
				
				if($brochure != 'no-image') 
				{ 
						$allowedExtensions = array("pdf", "rtf");
						if(check_file_ext($brochure) == true)
						{
								$b1 = $pdf_dir."".$brochure;
								$b2 = $pdf_dir."".$row['brochure'];
								if(file_exists($b2))
								{
									unlink($b2);
								}
								
								move_uploaded_file($_FILES['brochure']['tmp_name'], $b1);
								$brochure_q = ", brochure = '$brochure'";
								
						}	
						else
						{
							echo '<script>alert("Only jpg, png, jpeg, gif, pdf, rtf are allowed.")</script>';
						}
				}
				
				
				$update_q = "UPDATE project SET  cat = '$cat', sub_cat = '$sub_cat', pro_name = '$pro_name', pro_area = '$pro_area', pro_desc = '$pro_desc' ".$floor_plan_q.$floor_plan2_q.$floor_plan3_q.$floor_plan4_q.$floor_plan5_q.$floor_plan6_q.$floor_plan7_q.$floor_plan8_q.$map_q.$brochure_q.", upd_date = '$upd_date', upd_user = '$upd_user', upd_ip = '$upd_ip', city_id=$city_id WHERE pid = {$_POST['pid']}";   
				
				if(@mysql_query($update_q)) print "<script>alert('Project updated successfully!'); location = 'index.php';</script>";
				else print "<script>alert('An error occured while processing your request!! Please try again later.'); location = 'index.php';</script>";
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