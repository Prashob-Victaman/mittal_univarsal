<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include("config.php");
if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) { 


//Publishing
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "publish" && isset($_REQUEST['aboutCat']) && $_REQUEST['aboutCat'] != "" && isset($_REQUEST['status']) && $_REQUEST['status'] != "")
{
	$status = ($_REQUEST['status'] == "Y") ? "N" : "Y";
	//echo "update pages set published = '".$_REQUEST['status']."' where aboutCat = '".$_REQUEST['aboutCat']."'"; exit;
	$q_pub = mysql_query("update pages set published = '".$status."' where aboutCat = '".$_REQUEST['aboutCat']."'");
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
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script>
function _AboutEdit(cat) { 
var url = "About-Edit.php";
switch(cat) {
case "Company":
url += "?cat=WhoWeAre";  
location = url; 
break;


case 'People':
url += "?cat=People";
location = url; 
break;

case 'Organisation':
url += "?cat=Organisation";
location = url;
break;

case 'ReachUs':
url += "?cat=ReachUs";
location = url;
break;

case 'Optitrough':
url += "?cat=Optitrough";
location = url;
break; 

case 'Optitube':
url += "?cat=Optitube";
location = url;
break;

case 'Clients':
url += "?cat=Clients";
location = url;
break;

case 'Applications':
url += "?cat=Applications";
location = url;
break;

case 'Directions':
url += "?cat=Directions";
location = url;
break;

case 'Contact_Us':
url += "?cat=Contact_Us";
location = url;
break;

}
	}


function _AboutEdit1(cat) { 
var url = "About-Edit.php";
switch(cat) {
case cat:
url += "?cat="+cat;  
location = url; 
break;
}
}
</script>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<?php include($admin_includes."head_top.php"); ?>
           <div id="topmenu">
            	<?php $_GET['tab'] = 2; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
                <ul>
                    <!--<li><a href="home.php" class="report">Manage Home</a></li>
                    <li><a href="about.php" class="report"><strong>Manage About us</strong></a></li>-->
                </ul>
        
      </div>
        <div id="wrapper">
            
            <div id="content" >
              <div id="box" style="width:300">
                	<h3>ABOUT US</strong></h3>
                <table width="30%" class="sortable">
						<thead>
							<tr>
                            	<th width="309"><a href="#">Pages Under - About us</a></th>
                                <th width="147"><a href="#">Action</a></th>
                                <th width="251" style="border:none; background:#fff;"></th>
                            </tr>
						</thead>
						<tbody>
							
                            <?php 
							//$rs = @mysql_query($q) or die($admin->pop_err(1,$server,"mysql"));
							
							   $q = "SELECT * FROM pages WHERE category ='About_us' order by menu_name"; 
							   $rs = mysql_query($q) or die($admin->pop_err(1,$server,"mysql"));
							   while($rw = mysql_fetch_array($rs))
							   {
							    $aboutCat = $rw['aboutCat'];
								$menu_name = $rw['menu_name'];
								$published = ($rw['published'] != "Y") ? "Publish" : "Unpublish";
							?>
                            
                            <tr>
                            	
                            	<td><a href="javascript:;" onclick="_AboutEdit1('<?=$aboutCat;?>');"><?=$menu_name;?></a></td>
                                <td align="center">
									<a href="javascript:;" onclick="_AboutEdit1('<?=$aboutCat;?>');">Edit Content</a>
									<b>&nbsp;|&nbsp;</b><a href="?action=publish&aboutCat=<?=$aboutCat;?>&status=<?=$rw['published'];?>"><?=$published?></a>
								</td>
                                <td style="border:none;"></td>
                            </tr>
							<?php 
								}							
							?>
					</tbody>
					</table>
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