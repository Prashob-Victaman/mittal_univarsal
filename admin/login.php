<?php
session_start();
if(isset($_GET['do'])) { if($_GET['do'] == 'logout') session_destroy();    }
if(isset($_SESSION['uid']) && !empty($_SESSION['uname'])) header("location:index.php");
include("config.php");

//$admin -> 
if(isset($_POST['uname'])  && isset($_POST['upass'])) {

$uname = mysql_real_escape_string(trim($_POST['uname']));
$upass = mysql_real_escape_string(trim($_POST['upass']));

$admin_q = "SELECT user_id,username,userpass FROM users WHERE username = '$uname' AND userpass = '$upass' AND ugroup = 'Admin'";
$rs =  @mysql_query($admin_q) or die($admin->pop_err(2,$server,"mysql"));
$rw = mysql_fetch_array($rs);
if(mysql_num_rows($rs) > 0) { 

$_SESSION['uid'] = $rw['user_id']; 
$_SESSION['uname'] = $rw['username'];

## Lets update the last logged Date, IP 
$ldt = date("Y-m-d H:i:s");
$lip = $_SERVER['REMOTE_ADDR']; 
$lq = "UPDATE users SET last_log_date = '$ldt', last_log_ip = '$lip' WHERE user_id =".$rw['user_id']; 
@mysql_query($lq);
## End updating last logged Date, IP
mysql_close($con);
header("location:index.php");
}
else header("location:login.php?err=1");


}
			else	{ 
			
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login to Sterling Electro Control panel</title>
<META NAME="robots" CONTENT="noindex,nofollow">
<META NAME="author" CONTENT="Nadeer M - (c)http://www.reversethought.com/">
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script type="text/javascript">
function _val_login() { 
var _uname = document.forms.admin_login.uname.value;
var _upass = document.forms.admin_login.upass.value;
if(_uname.length<2 || _upass.length<2) { alert("Please enter admin user name and password to enter to Control Pannel!"); return false} else return true;

						}


</script>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<?php include($admin_includes."head_top.php"); ?>
    
      </div>
       
        <div id="wrapper">
            <div id="content" style="margin-top:80px; background:none; width:900px;">
                <p>&nbsp;</p>
             <div>
					<h3>&nbsp;</h3>
					
					<p>&nbsp;</p>
		  <h3>Login to Mittal Universal Control Pannel <br>
					<br>
&nbsp;</h3>				
<?php

$err = (isset($_GET['err']) ? $_GET['err'] : 0);
switch($err) { 
case 1:
echo "<h4 align=\"center\" style=\"font-size:12px;\"><font color=\"#FF0000\">Incorrect username or password. Please try Again.</font></h4>";
break;

case 2:
echo "<h4 align=\"center\" style=\"font-size:12px;\"><font color=\"#FF0000\">Your Session Expired!. Please Login Again.</font></h4>";
break;

case 3:
echo "<h4 align=\"center\" style=\"font-size:12px;\"><font color=\"#FF0000\">For security reason, we have logged you out!. </font></h4>";
break;

//case default: 
//echo "<font color=\"#FF0000\">Your Session Expired!. Please Login Again.</font>";
//break;

} 
?>




	<form id="form" name="admin_login" method="POST" onsubmit="return _val_login();">
                    
                      <fieldset id="address">

                        <legend>&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</legend>
                        <br />
                        <label for="user">Username : </label> 
                        <input name="uname" tabindex="1" type="text" style="width:150px;">
                        <br>
                        <label for="password">Password : </label>
                        <input name="upass" tabindex="2" type="password" style="width:150px;">
                      </fieldset>&nbsp;
                      <div align="center"><input name="action" value="login" type="hidden">
                        <input id="button1" value="Login" type="submit" name="submit"  />
                        <input id="button2" onclick="form1.reset();" type="reset">
                      <br />
                      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                      </div>
                    </form>

                </div>
            </div>
            
      </div>
      
        <div id="footer" >
        
                <div id="credits">
   		Powered by <a href="http://www.reversethought.com/" target="_blank"> Reverse Thoughts</a>
        </div>
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
			#end page contents
					}  

?>