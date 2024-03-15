<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include("config.php");



if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) { 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
   
function _getTags(_me, _desc, _fld) { 
if(_me.checked == true ) {
_txt = _desc.value;
_spl = _txt.split(" ");
_tags = "";
_exclude = new Array('this', 'these', 'have', 'more', 'less', 'having', 'value', 'enough', 'both',  'available', 'they', 'their', 'them');
for(i=0; i <_spl.length; i++) { 
_spl[i] = _spl[i]; 
_spl[i] = _spl[i].toLowerCase();
if(_spl[i].length >3 && !_inArray(_exclude, _spl[i])) _tags += _spl[i] + ', '; 
}
if(_tags.charAt(_tags.length-2) != ',')  if(_fld.value.length>0)_fld.value = _fld.value+','+_tags; else _fld.value = _fld.value+_tags; 
else if(_fld.value.length>0) _fld.value = _fld.value+','+_tags.substring(0, _tags.length-2); else  _fld.value = _fld.value+_tags.substring(0, _tags.length-2);
} else  _fld.value = '';  
document.forms.AddEditAbout.xt.disabled = true;

}

function _inArray(arr, obj) {
  for(var i=0; i<arr.length; i++) {
  		    if (arr[i] == obj) return true;
  }
}
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script src="includes/ckeditor/ckeditor_basic_source.js"></script>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<?php include($admin_includes."head_top.php"); ?>
    <div id="topmenu">
            	<?php $_GET['tab'] = 2; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
<?php    
      // LETS UPDATE THE ABOUT TEXT

if(!empty($_POST['AboutUpdate']) &&  !empty($_POST['Acat'])) { 
$acat = $_POST['Acat'];
$acontent  = addslashes($_POST['acontent']);
$adate = date("Y-m-d H:i:s");
$auser = $_SESSION['uid'];
$aip = $_SERVER['REMOTE_ADDR'];
$tname = (!empty($_POST['tname'])) ? $_POST['tname'] : '';
$menu_name = (!empty($_POST['menu_name'])) ? $_POST['menu_name'] : '';
$ctags = (!empty($_POST['ctags'])) ? $_POST['ctags'] : '';
$cpg_title = (!empty($_POST['cpg_title'])) ? $_POST['cpg_title'] : '';
$cpg_desc = (!empty($_POST['cpg_desc'])) ? $_POST['cpg_desc'] : '';
$cpg_keywords = (!empty($_POST['cpg_keywords'])) ? $_POST['cpg_keywords'] : '';

$image = (!empty($_FILES['image']['name'])) ? time().$_FILES['image']['name'] : 'no-image';

$sql_image="Select image from pages where aboutCat = '".$acat."'"; 
$rs_image=mysql_query($sql_image);                      
$row_image=mysql_fetch_array($rs_image);                                        //fatching image.

$image_q = "";


if($image != 'no-image') 
{ 
		$allowedExtensions = array("jpg","png","jpeg","gif");
		if(check_file_ext($image) == true)
		{
				$f1 = $img_dir."".$image;
				$f2 = $img_dir."".$row_image['image'];
				if(file_exists($f2))
				{
					unlink($f2);
				}
				
				move_uploaded_file($_FILES['image']['tmp_name'], $f1);
				$image_q = ", image = '$image'";
				
		}	
		else
		{
			echo '<script>alert("Only jpg, png, jpeg, gif are allowed.")</script>';
		}
}

$q = "UPDATE pages SET aboutCat =  '$acat', title = '$tname', menu_name = '$menu_name', content = '$acontent', upd_date = '$adate', upd_user = '$auser', upd_ip = '$aip', tags = '$ctags', pg_title = '$cpg_title', pg_desc = '$cpg_desc', pg_keywords = '$cpg_keywords'".$image_q." WHERE aboutCat = '".$acat."'"; 
  
if(@mysql_query($q))  print "<script>alert('Updated successfully!'); location='About.php';</script>"; 
else print "<script>alert('Error occured while trying to update this page. Please try again later.'); location='About.php';</script>"; 
exit;

} 
// ENDS UPDATING ABOUT TEXT

?>
        <div id="top-panel">
                <ul>
                    <li><a href="home.php" class="report">Manage Home</a></li>
                    <li><a href="about.php" class="report"><strong>Manage About us</strong></a></li>
                </ul>
      </div>
        <div id="wrapper">
            <div id="content">
               <div id="box" style="width:300">
               <?php 
			   $q = "SELECT * FROM pages WHERE aboutCat ='".$_GET['cat']."' LIMIT 1"; 
			   $rs = mysql_query($q) or die($admin->pop_err(1,$server,"mysql"));
			   $rw = mysql_fetch_array($rs);
			   $cat = $rw['aboutCat'];
				$title = $rw['title'];
				$menu_name = $rw['menu_name'];
			   $content = stripslashes($rw['content']);
			   $res = split(",",substr(preg_replace("/([A-Z])/",',\\1',$menu_name),1));
			   $catTit = "";		    
				$ctags = $rw['tags'];
				$cpg_title = $rw['pg_title'];
				$cpg_desc = $rw['pg_desc'];
				$cpg_keywords = $rw['pg_keywords'];
				$image = $rw['image'];
			   
			   foreach($res as $value) {$catTit .= $value. " "; } 
			   
			   ?>
             
                	<h3>CMS - ADD/EDIT AREA</strong></h3>
                    <form id="form" action="" name="AddEditAbout" method="POST" enctype="multipart/form-data" >
                      
                      <fieldset id="address">
                        <legend>EDIT - <?=$catTit;?></legend>
                        <br />
                        
                        <label for="street">Menu Name : </label> 
                        <input name="menu_name" id="street" type="text" tabindex="1" value="<?=$menu_name;?>" />
                        <br />
						
                        <label for="street">Title/Name : </label> 
                        <input name="tname" id="street" type="text" tabindex="1" value="<?=$title;?>" />
                        <br />
                       <strong>Content :</strong> 
                       <br />
                       <textarea  name="acontent"  id="ccontent" tabindex="7"><?=$content;?></textarea>
                       <br /><br /> 
                       
                        <label for="descr">Image : </label> 
                        <input name="image" id="image" type="file"/>
                        <div style="margin-left:160px;">
                        <?php if($image != 'no-image') {?>
							<img src="image.php?src=<?=$image;?>&x=100&f=0" border=1 align="top"/>                                   
                          <br />
                         <?php } ?> 
                         <b>(Select only jpg, jpeg, gif, png images image dimensions shoud be 416px × 292px) </b>
                         <br />
                          <b>Select image files only if you want to change the existing one or not any image are there. </b>
                          </div> 
                        
                      
                      <br />
                       <label for="tags">Tags : </label>
                       
                       <textarea style="width:296px; height:60px; margin-bottom:0px; " name="ctags" tabindex="8" ><?=$ctags;?></textarea>
						<div style="margin-left:160px;"> Enter coma seperated Tags(Eg: a,b,c,etc) </div>
                       <br />


                        </fieldset>
                        <br />
                       <fieldset id="address">
                       
                        <legend>For SEO Purpose</legend>
                      
                      <label for="pagetitle">Page Title : </label>
                       
                       <textarea style="width:296px; height:60px; margin-bottom:0px; " name="cpg_title" tabindex="9" ><?=$cpg_title;?></textarea>  
                      <br /><br />

                        <label for="description">Description : </label>
                       <textarea style="width:296px; height:60px; margin-bottom:0px; " name="cpg_desc" tabindex="10" ><?=$cpg_desc;?></textarea>  
                         <br /><br />
                        
                        <label for="keywords">Keywords : </label>
                       
                       <textarea style="width:296px; height:60px; margin-bottom:0px; " name="cpg_keywords" tabindex="11" ><?=$cpg_keywords;?></textarea> 
					   <div style="margin-left:160px;">Enter coma seperated keywords(Eg: a,b,c,etc) </div>
                         <br /><br />
                         
	                     <label for="firstname"></label>
                         <input type="checkbox" name="xt"  align="absmiddle"   tabindex="12" onclick="_getTags(this, document.forms.AddEditAbout.ctags,document.forms.AddEditAbout.cpg_keywords)" style="vertical-align:middle; "/> 
                         Click to auto extract keywords from tags provided.
                         <div style="margin-bottom:0px; margin-top:0px;">&nbsp;</div>   
                          </fieldset>
<script src="includes/ckeditor/color.js"></script>                                                                       
<script>	
//height:"291",
//width:"400",		
	//uiColor: color,
CKEDITOR.replace( 'ccontent',
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
                      
                      
                      
                      <div align="center">
                      <input id="button1" type="submit" value="Add / Update"  tabindex="8"/> 
                     <input id="button2" type="button" tabindex="10" value="Go Back" onclick="javascript:history.go(-1);"/>
                      </div>
                        <input type="hidden" name="AboutUpdate" value="YES" />
                      <input type="hidden" name="Acat" value="<?=$cat;?>" /> 
                    </form>
                    
                    </div>
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
<?php
}
else header("location:login.php?err=2"); ?>