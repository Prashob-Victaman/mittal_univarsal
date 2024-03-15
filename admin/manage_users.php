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
<title>Users - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/checkall.js"></script> 
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
   
   
	function _addUsrVal() { 
	var _err = ""; 
	var  frm = document.forms.adduser;
	var fname = frm.fname.value; 
	var lname = frm.lname.value; 
	var email = frm.email.value;
	var uname = frm.uname.value;
	var femail = email.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/);
	var pass1 = frm.pass1.value;
	var pass2 = frm.pass2.value;
	
	if(!fname || !lname) _err += "Please enter a Name for new user! \n";
	if(!email || !femail) _err += "Please enter a proper email ID! \n";
	if(pass1 != pass2) _err += "Password Mismatch! \n";
	if(pass1.length<6 || pass2.length<6) _err += "Please enter atleast 6 characters for your password! \n";
	if(!uname || uname.length < 4) _err += "Please enter correct user name(It must have atleast 3 characters) \n"; 
	
	if(_err) { alert("The following errors are occured while submiting your form! \n Please correct and submit again to add the new user \n\n" + _err); return false; } else return true;
	
	   
	}
	
	
	function DelUsr(uid) { 
	var loc = "manage_users.php?do=delusr&uid="+uid;
	var conf = confirm("You are going to Delete this User!!\n\n Press 'Ok' to Delete Or Press 'Cancel' to Stay the User.."); 
	if(conf) location = loc; else return true; 	
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
        	<?php 
			include($admin_includes."head_top.php");
			require_once 'includes/Pager/Pager.php';
			 ?>
    <div id="topmenu">
  
            	<?php   $_GET['tab'] = 3; include($admin_includes."top_nav.php"); ?>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
					<li><a href="manage_users.php" class="folder">Add New User</a></li>
                   
            </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Users</h3>
                	<form name="form1" id="form1" method="post"> 
                	<table width="100%" >
						<thead>
							<tr>
							  <th width="10"><input type="checkbox" name="chk" id="chk" onclick="check(this.form.chk)" value=""/></th>
							  <th width="40px"><a href="#">ID</a></th>
                            	<th><a href="#">Full Name</a></th>
                                <th><a href="#">Email</a></th>
                                <th><a href="#">Username</a></th>
                                <th width="70px"><a href="#">Group</a></th>
                                
                                <th width="90px"><a href="#">Registered</a></th>
                                <th width="60px"><a href="#">Action</a></th>
                            </tr>
						</thead>
						<tbody>
							
                            <?php 
// get the pager input values
  $page = (!empty($_GET['p'])) ? $_GET['p'] : '';
  $limit = (!empty($_SESSION['limit'])) ? $_SESSION['limit'] : 10; // set the max data each page
  //query for calculate the num rows of the data
  $result = mysql_query("SELECT count(*) as cnt FROM users");
  $total = mysql_result($result, 0, "cnt");
  $fdir = $_SERVER['PHP_SELF']; 
  $pager  = Pager::getPagerData($total, $limit, $page);
  $offset = $pager->offset;
  $limit  = $pager->limit;
  $page   = $pager->page; 
  if($total == 0) $offset = 0;
  
  
  
$rs = mysql_query("SELECT * FROM users ORDER BY name LIMIT $offset, $limit");							
							while($rw = mysql_fetch_array($rs)) { 							
							?>
                            
                            <tr>
                              <td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $rw['user_id'];?>" /></td>
                              <td class="a-center"><?=$rw['user_id'];?></td>
                            	<td><a href="manage_users.php?uid=<?=$rw['user_id'];?>&do=editusr"><?=$rw['name'];?></a></td>
                                <td><?=$rw['email'];?></td>
                                <td><?=$rw['username'];?></td>
                                <td><?=$rw['ugroup'];?></td>
                                
                                <td><?php echo  date("M d, Y",strtotime($rw['created_date'])); ?></td>
                                <td align="center"><!--<a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a>--><a href="manage_users.php?uid=<?=$rw['user_id'];?>&do=editusr"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="javascript:;" onclick="DelUsr(<?=$rw['user_id'];?>);"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<? } ?>
						</tbody>
					</table>
                    <input type="button" name="delete" value="Delete Multiple" onclick="javascript:delcheck();" style="color:#F25; height:22px;  border:#fff dotted 2px;"/>
                    <input type="hidden" name="action" value="Delete" />
            </form>        
					
<script>
function __limit(_val) {
<? if(empty($_GET['cat']) && empty($_GET['p'])) { ?>  
location = 'manage_users.php?show='+_val;
<? } else { ?>
location = 'manage_users.php?<?=$_SERVER['QUERY_STRING'];?>&show='+_val;
<? } ?> 
}
</script>
                    	
		    <div id="pager">
            <center>
                    	
         <?php
						$u = (!empty($_GET['hotel_Id'])) ? 'manage_users.php?hotel_Id='.$_GET['hotel_Id'].'&' : 'manage_users.php?';
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
          <br />
                </div>
                <br />
                <div id="box">
                	<h3 id="adduser">Add user</h3>
                    <?php
					// DELETE USER -- STARTS 
					$del = (!empty($_GET['do']))?$_GET['do']:'';
					if($del == "delusr") { 
					$uid  = mysql_real_escape_string(trim($_GET['uid']));
					$del_q = "DELETE FROM users WHERE user_id = ".$uid;
					$delrs = @mysql_query($del_q);
					if($delrs) { print "<script>alert('User Deleted Successfully!'); location = 'manage_users.php';</script>"; 
					
					}
					else { print "<script>alert('Error occured while processing your request. Please try again!'); location = 'manage_users.php';</script>"; }
					}					
					//END ~~ DELETE USER 
					
					
					//Delete multiple User
						if(isset($_POST['action']) && $_POST['action']=="Delete")
						{
						  foreach($_POST['chk'] as $key)
						  {
						  
							mysql_query("delete from users where user_id=".$key);
						  }
						  echo '<script> location="manage_users.php";</script>';
						}
					//Delete multiple User
					
					
					// UPDATE-EDIT USERS
					$update = (!empty($_POST['editusr']))?$_POST['editusr']:'';
					if($update == "YES") { 
					$update_q = "SELECT * FROM users WHERE user_id = ". $_POST['uid'];
					$update_rs = @mysql_query($update_q); 
					$updata = mysql_fetch_array($update_rs);
					$udate = date("Y-m-d H:i:s");
					$name = $_POST['fname']." ".$_POST['lname'];
									
					 if($updata['username'] != $_POST['cur_uname'] &&  $updata['username'] == $_POST['uname']  ) { print "<center><br><h4><font color='red'>The username is already taken! Please choose another one and try..</font></h4></center>";} else { 

					$uq = "UPDATE users SET email='{$_POST['email']}', name = '$name', tel = '{$_POST['tel2']}', username = '{$_POST['uname']}', userpass = '{$_POST['pass1']}', updated_date = '$udate' WHERE user_id = {$_POST['uid']}";
					
					 $uprs = mysql_query($uq) or print("<center><br><h4><font color='red'>An error occured while processing your request. Please check the username already exist and try again!</font></h4></center>");
					 if($uprs) print "<center><br><h4><font color='red'>User Data Updated Successfully!</font></h4></center>";
					 
					 } // end user already exist
					
					
					
					}
					// END UPDATE USER
					
					
					
					
					// INSERT-ADD NEW USER
					if(!empty($_POST['addusr'])) {
					if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pass1']) || empty($_POST['pass2']) || empty($_POST['uname'])) print "<center><br><h4><font color='red'>Please fill all fields and try again!</font></h4></center>"; 
					else {
					$name = $_POST['fname']." ".$_POST['lname'];
					$curdate = date("Y-m-d H:i:s");
$cq = "SELECT count(*) as cnt FROM users WHERE username = '{$_POST['uname']}'";
$cr = mysql_query($cq);
$cw = mysql_fetch_array($cr); 
if($cw['cnt'] < 1) {  					// Lets find if the username already exist or not

$add_usr_q = "INSERT INTO users (email, ugroup, name, tel, username, userpass, usertype, created_date, updated_date, last_log_date, created_ip, last_log_ip) VALUES('{$_POST['email']}', '{$_POST['group']}', '$name',{$_POST['tel']}, '{$_POST['uname']}', '{$_POST['pass2']}', 'Admin', '$curdate', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '{$_SERVER['REMOTE_ADDR']}','{$_SERVER['REMOTE_ADDR']}')"; 
if(@mysql_query($add_usr_q)) print "<center><br><h4><font color='green'>New user added successfully!</font></h4></center><script>location='manage_users.php';</script>";
else print "<center><br><h4><font color='red'>Error occured while processing your request. Please try again later.</font></h4></center>"; 					
					} 
					else print "<center><br><h4><font color='red'>The username is already taken! Please choose another one and try..</font></h4></center>";
					
					// Add to DB
					
					
					
					}				
					}	
					
			// END ~~~  INSERT-ADD NEW USER ~~~ END 
					
					
					// START -- EDIT USER CODES HERE
					$do = (isset($_GET['do'])) ? $_GET['do'] : '';
					if($do == 'editusr') {
					// nrm  add codes here EDIT USER CODES HERE
					$uedit_q =  "SELECT * FROM users WHERE user_id = ".$_GET['uid'];
					$uedit_rs = @mysql_query($uedit_q); 
					if(mysql_num_rows($uedit_rs) < 1 || mysql_num_rows($uedit_rs) > 1) { $_GET['err'] = 3;
					print "<script>location='login.php?do=logout&err=3';</script>"; } 
					$usr = mysql_fetch_array($uedit_rs); 
					$name = explode(" ",$usr['name']);
					$fname = $name[0];
					$lname = $name[1];
					
					// nrm  add codes here EDIT USER CODES HERE
					?>
                    
                    
                    <form id="form" action="" name="adduser" method="POST" onsubmit="return _addUsrVal();">
                      <fieldset id="personal">
                        <legend>PERSONAL INFORMATION</legend>
                        <label for="fname">First name : </label> 
                      <input name="fname" id="lastname" type="text" tabindex="1" value="<?=$fname;?>"/>
                        <br />
                  <label for="firstname">Last name : </label>
                        <input name="lname" id="firstname" type="text" 
                        tabindex="2" value="<?=$lname;?>"/>
						
						<br />
                  <label for="firstname">Username : </label>
                        <input name="uname" id="firstname" type="text" 
                        tabindex="3"  value="<?=$usr['username'];?>"/>
                        <input type="hidden" name="cur_uname" value="<?=$usr['username'];?>"  />
                        <br />
                        <label for="email">Email : </label>
                        <input name="email" id="email" type="text" 
                        tabindex="4" value="<?=$usr['email'];?>"/>
                        <br />
                        
                        <label for="tel">Telephone : </label>
                        <input name="tel2" id="tel2" type="text"  tabindex="5"  value="<?=$usr['tel'];?>"/>
                        <br />
                        <!--<p>Send auto generated password 
                            <input name="generatepass" id="yes" type="checkbox" 
                        value="yes" tabindex="35" /></p>-->
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Enter new password:</b><br />
                      <label for="pass1">Password : </label>
                      <input name="pass1" id="pass" type="password" 
                        tabindex="6" />
                    <br />
                        <label for="pass2">Password : </label>
                        <input name="pass2" id="pass-2" type="password" 
                        tabindex="7" />
                        <br />
                      </fieldset>
                      <!--<fieldset id="address">
                        <legend>Address</legend>
                        <label for="street">Street address : </label> 
                        <input name="street" id="street" type="text" 
                        tabindex="1" />
                        <br />
                        <label for="city">City : </label>
                        <input name="city" id="city" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="country">Country : </label> 
                        <input name="country" id="country" type="text" 
                        tabindex="1" />
                        <br />
                        <label for="state">State/Province : </label>
                        <input name="state" id="state" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="zip">Zip/Postal Code : </label>
                        <input name="zip" id="zip" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="tel">Telephone : </label>
                        <input name="tel" id="tel" type="text" 
                        tabindex="2" />
                      </fieldset>-->
                      <fieldset id="opt">
                        <legend>OPTIONS</legend>
                        <label for="choice">Group : </label>
                        <select name="group">
                          <option selected="selected" value="Admin">
                          Admin
                          </option>                        </select>
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Update"  tabindex="8"/> 
                      <input id="button2" type="reset" tabindex="9"/>
                      </div>
                      <input type="hidden" name="editusr" value="YES"  /> 
                      <input type="hidden" name="uid" value="<?=$usr['user_id'];?>"  />
                    </form>
					
					<?php
					 					// END -- EDIT USER CODES HERE
					 } 
					else {   			
					?>
       <form id="form" action="" name="adduser" method="POST" onsubmit="return _addUsrVal();">
                      <fieldset id="personal">
                        <legend>PERSONAL INFORMATION</legend>
                        <label for="fname">First name : </label> 
                      <input name="fname" id="lastname" type="text" tabindex="1" />
                        <br />
                  <label for="firstname">Last name : </label>
                        <input name="lname" id="firstname" type="text" 
                        tabindex="2" />
						
						<br />
                  <label for="firstname">Username : </label>
                        <input name="uname" id="firstname" type="text" 
                        tabindex="3" />
                        <br />
                        <label for="email">Email : </label>
                        <input name="email" id="email" type="text" 
                        tabindex="4" />
                        <br />
                        
                        <label for="tel">Telephone : </label>
                    <input name="tel" id="tel" type="text" 
                        tabindex="5" /><br />
                        <!--<p>Send auto generated password 
                            <input name="generatepass" id="yes" type="checkbox" 
                        value="yes" tabindex="35" /></p>-->
                      <label for="pass1">Password : </label>
                      <input name="pass1" id="pass" type="password" 
                        tabindex="6" />
                    <br />
                        <label for="pass2">Password : </label>
                        <input name="pass2" id="pass-2" type="password" 
                        tabindex="7" />
                        <br />
                      </fieldset>
                    
                      <fieldset id="opt">
                        <legend>OPTIONS</legend>
                        <label for="choice">Group : </label>
                        <select name="group" tabindex="8">
                          <option selected="selected" value="Admin">
                          Admin
                          </option>                        </select>
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Add User"  tabindex="9"/> 
                      <input id="button2" type="reset" tabindex="10"/>
                      </div>
                      <input type="hidden" name="addusr" value="YES"  /> 
                    </form>             
<? } ?>
                </div>
            </div>
            <div id="sidebar">
  		<?php include($admin_includes."right_nav_bar.php"); ?>  
          </div>
      </div>
        <div id="footer">
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