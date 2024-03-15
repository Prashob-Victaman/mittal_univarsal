<?php

class core_class {
 
function pop_err($err_no,$server,$type) {
#function to mange errors for local & live servers
if($server != 'local')  { 
$err = Array(0 => "Unable to connect to the database server!", 1 => "Unable to connect to the database!", 2 => "Database query failed!"); 
if($err[$err_no])  { 
print "Error : ".$err[$err_no]. " Sorry for the inconvienience caused..";
} 
else print "Error : Unusual error occured while proccessing!! Sorry for the inconvienience caused..";

						}
						else { 
switch($type) { 
case 'mysql':
return "[".mysql_errno()."] => ".mysql_error();
break;

default:
print "Unusual error/ error not configured !! Go to ".$_SERVER['PHP_SELF']." to check";
}
						 
							 }
										
										}
										
										
# ==========================================================================================================


function GenPass($length = 8)
  {
     $password = "";

$possible = "AaP#bcd1Bfghj2kmCnp3qrOtv~wNxyD4zBC5D#eFGfH6JmKgLMh7NP8QR9Tj#VWkXaYlZ";
$maxlength = strlen($possible);
  // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
       
        $i++;
      }

    }

    // done!
    return $password;

  }


										
#---------------------Start -------
		function simpleXor($InString, $Key) 
		{
	   	$KeyList = array();
	   	$output = "";
	  	for($i = 0; $i < strlen($Key); $i++){
		$KeyList[$i] = ord(substr($Key, $i, 1));
	  	}
		for($i = 0; $i < strlen($InString); $i++) 
		{
			$output.= chr(ord(substr($InString, $i, 1)) ^ ($KeyList[$i % strlen($Key)]));
 		}
		return $output;
		}
        function ecr($str)
		{
		return base64_encode($this->SimpleXor($str,base64_decode("cXVhbnR1bXN0ZXAyMDA5")));
		}		
#---------------------End ---------									
										
										
										
										
										
										
										
										
########## CLASS  END ############
}
?>
