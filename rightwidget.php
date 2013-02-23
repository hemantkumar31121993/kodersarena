<?php
include "dbconnect.php";
$query="select * from score order by rank";
$result=mysql_query($query) or die(mysql_error());
?>	
<div class="rightwidget">
	<div class="leaderboard-heading">
		<h2><center>Leader Board</center><hr/></h2>
	</div>	
	<table class="leaderboard" width="195">
	<?php
     for($c=0 ; $c <6 ; $c++)	
	 {
	 $row = mysql_fetch_array($result);
	 ?>
		<tr>
		<td width="130"><?php echo  $row[tname] ; ?></td><td>[<?php echo  $row[score] ; ?>]</td>
	</tr>
	<?php
	}
	?>	 
	</table>
</div>
  
