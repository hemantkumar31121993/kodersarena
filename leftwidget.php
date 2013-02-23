<?php
  	include "dbconnect.php";
	$query="select * from online order by id desc";
	$result=mysql_query($query) or die(mysql_error());

?>	 
<div class="leftwidget">
	<div class="online-header" onclick="_open()">Now Online
	</div>
	<table class="online">
		<?php 
			$i=0;
			while($row = mysql_fetch_array($result) and $i < 5)
			{	$i++;
				echo "<tr>";
				echo "<td>" . $row['username'] . "</td>";
				echo "</tr>";
	
			}
		?>

	</table>
</div>
