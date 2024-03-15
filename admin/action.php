<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
if(!empty($_GET['do'])) { 
require_once 'config.php';

$do = $_GET['do'];
switch($do) { 

case 'save_order':
if(!empty($_GET['oid']) && isset($_GET['newval'])) { 
$oid = $_GET['oid'];
$new_val = $_GET['newval']; 

$upd = @mysql_query("UPDATE home_image SET lstOrder = $new_val WHERE image_id = $oid LIMIT 1") ;
}
break;

case 'city_order':
if(!empty($_GET['oid']) && isset($_GET['newval'])) { 
$oid = $_GET['oid'];
$new_val = $_GET['newval']; 

$upd = @mysql_query("UPDATE city SET lstOrder = $new_val WHERE city_id = $oid LIMIT 1") ;
}
break;

} // end switch
} // end main if
else print "<h1><i>HTTP 403 Access Forbidden!</i></h1>";

?>