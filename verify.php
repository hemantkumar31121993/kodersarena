<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");

$tname=$_POST['tname'];
$tpass=$_POST['tpass'];
include "dbconnect.php";
$t=time();

$query="SELECT * FROM team ".
	"WHERE tname=\"$tname\"";
$result = stripSlashes($query) ;
$result = mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);
$unixtime = date('l dS \of F Y h:i:s A');
if($tname!='' && tpass!='')
{
    
	if($tpass == $row['tpass'])
	{
		setcookie("userstats[tid]", $row['tid']);
		setcookie("userstats[loggedin]", 1);
		setcookie("userstats[logintime]", date("d-m-Y H:i:s", mktime()));
		header("Location:redirect.php?t=$t");
	}
}
$_SESSION['tname']=$tname;
include "header.php";
?>
<script type="text/javascript">
document.title=document.title + " VerifyLogin";
</script>
<?php
	
	echo "<div style=\"color:#000;font-size:14px;\"><center><br><br/><br/><br/><b>Error 403:</b> Invalid Login! Either your Username and/or Password is incorrect.<br>";
	echo "If you have not registered yet, please <a style=\"color:#000\" href=\"register.php?t="; echo $t; echo "\">Register</a> first and then Sign In.<br>";
	echo "<br><a style=\"color:#000\" href=\"index.php?t=$t\">Click here to go back to Login page</a></center></div>";

mysql_free_result($result);
mysql_close($conn);
?>
<br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include 'footer.php'?>
<?php
include 'dbconnect.php';

//$conn=mysql_connect($host,$user,$password) or die(mysql_error());
//mysql_select_db($database) or die(mysql_error());
$query1="insert into online (username) values('$tname')";
mysql_query($query1);
mysql_close($conn);
?>
