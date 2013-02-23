<?php
	/**********Connect to MySQL - score table***********/
	$score_active=1;
	include "header.php";
	include "dbconnect.php";
?>

<script type="text/javascript">
	document.title=document.title + " | Score";
</script>
	<?php if($loggedin)
		include "rankcard.php"; ?>
	<div class="body-content">
		<div class="scoreboard">
			<table class="scoretable">
				<tr>
					<td colspan="6" class="score-header">
					CodeBoard at <?php $t = time(); echo  date("m/d/y G:i:s A",$t);?>
					</td>
				</tr>
				
				<tr>
					<td width="80" align="center"><b>Rank</b></td>
					<td width="100" align="center"><b>Username</b></td>
					<td width="100" align="center"><b>Score</b></td>
					<td width="120" align="center"><b>Submissions</b></td>
					<td width="200" align="center"><b>Problems Solved</b></td>
					<td width="200" align="center"><b>Latest Correct Submission</b></td>
				</tr>
					<?php
					
						$query="select * from score order by rank";
						$result=mysql_query($query) or die(mysql_error());
						$row = mysql_fetch_array($result);
						do
						{	
							$prob_solved=substr($row["solved"],1);
							if($prob_solved=='')
							{
								$prob_solved='-';
							}
							echo "<tr>\n";
							echo "<td align=\"center\">".$row["rank"]."</td>\n";
							echo "<td align=\"center\">".$row["tname"]."</td>\n";
							echo "<td align=\"center\">".$row["score"]."</td>\n";
							echo "<td align=\"center\">".$row["sub"]."</td>\n";
							echo "<td align=\"center\">".$prob_solved."</td>\n";
							echo "<td align=\"center\">".$row["timestmp"]."</td>\n";
							echo "</tr>\n";
						}while($row = mysql_fetch_array($result));
					?>
				<tr></tr>
				
			</table>
		</div>
	</div>

<?php include "footer.php"; ?> 
</body>
</html>

