<?php
#Error Report Settings
$server = "live"; // use local, live values 

# Admin General Configuration */
$root_dir = "/";
$admin_includes = "includes/";
$class	= "includes/class/";
$img_dir = "upload_images/";
$pdf_dir = "upload_pdfs/";


# Admin DB -- MySQL
if($server == 'live') 
{
	$db_config = Array(
	'host' => 'mittal2357.db.14072451.8cd.hostedresource.net',
	'user' => 'mittal2357',
	'pass' => 'CW8!ouA56@5Z',
	'db' => 'mittal2357'
	);


	
}	

else 
{
	$db_config = Array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'db' => 'mittal'
	); 
	

}
$from = "niranjan.verma.in@gmail.com";
$replyto = "niranjan.verma.in@gmail.com";
$adminmail = "niranjan.verma.in@gmail.com"; 


# ------------------
# END GENERAL CONFIG
# ------------------
require_once($class."core_class.php");
$admin = new core_class();
if($server == 'local') error_reporting(E_ALL);  else { error_reporting(0); }


$con = @mysql_connect($db_config['host'],$db_config['user'],$db_config['pass']) or die($admin->pop_err(0,$server,"mysql"));
@mysql_select_db($db_config['db']) or die($admin->pop_err(1,$server,"mysql"));


function check_file_ext($fileName) 
{ 
	global $allowedExtensions;
	if (!in_array(end(explode(".", strtolower($fileName))), $allowedExtensions)) return false;
	else return true;
}
?>