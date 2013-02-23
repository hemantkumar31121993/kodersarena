<?php

/************Check if a user is logged in*************/
header("Cache-Control: no-cache, must-revalidate");
$user=$_COOKIE['userstats'];
$t=time();
if(isset($user))
{
	$tname=$user["username"];
	$loggedin=$user["loggedin"];
	$logintime=$user["logintime"];
}
else
{
	$loggedin=0;
}
if($loggedin){
include "retrieve.php";
$t=time();
}
$status_active=1;
include "header.php";
include "dbconnect.php";
?>

<script type="text/javascript">
	document.title=document.title + "| Judge Status";
</script>

<?php if($loggedin) include "rankcard.php"; ?>
	<div class="body-content">	
		<div class="statusboard">
			<table class="statustable">
			<tr>
			<td colspan="6" class="status-header">
				Current Judge Status as on <?php $t = time(); echo date("G:i:s A",$t); ?>
			</td>
			</tr>
			<tr>
				<td width="80" align="center"><b>CID</b></td>
				<td width="180" align="center"><b>Time</b></td>
				<td width="120" align="center"><b>Username</b></td>
				<td width="130" align="center"><b>Problem no</b></td>
				<td width="150" align="center"><b>Result</b></td>
				<td width="140" align="center"><b>Running Time</b></td>
			</tr>
			<?php
			$query="select * from compiler order by cid desc";
			$result=mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);
			do
			{
				echo "<tr>\n";
				echo "<td align=\"center\" width=\"\">".$row["cid"]."</td>\n";
				echo "<td align=\"center\" width=\"\">".$row["time"]."</td>\n";
				echo "<td align=\"center\" width=\"\">".$row["tname"]."</td>\n";
				echo "<td align=\"center\" width=\"\">".$row["problemid"]."</td>\n";
				echo "<td align=\"center\" width=\"\">".$row["result"]."</td>\n";
				echo "<td align=\"center\" width=\"\">".$row["runningtime"]."</td>\n";
				echo "</tr>\n";
			}while($row = mysql_fetch_array($result));
			?>
			</table>	
		</div>
	</div>

<?php include "footer.php"; ?> 
</body>
</html>
