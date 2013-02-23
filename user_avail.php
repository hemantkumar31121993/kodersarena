<?php
//$username=$_GET['user'];
$username = trim($_GET['user']); // cut spaces around

header("Cache-Control: no-cache, must-revalidate");




if(strpos($username," ") !==false) // check for more than one space in the middle
{
	    echo "0"; // Show some error message...
	}
else if(!preg_match('/^[a-z0-9_ ]+$/', $username)) // check for valid characters
{
   echo "0";// Show some error message...
}
else if(strlen($username) < 4 || strlen($username) > 15)
{
  echo "1"; // Show some error message...
}
else
{  
	 include "dbconnect.php";
   	$query="SELECT count(*) FROM user ".
		"WHERE username=\"$username\"";
	$result = stripSlashes($query) ;
	$result = mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_row($result);
	mysql_free_result($result);
	mysql_close($conn);
	if($row[0]==0)
	{
	echo "2";
	}
	else
	{
	echo "3";
	} // Username is good.
}


?>
