<?php

/************Check if a user is logged in*************/
header("Cache-Control: no-cache, must-revalidate");
$user=$_COOKIE['userstats'];
$t=time();
if(isset($user))
{
	$tname=$user["tname"];
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
$credits_active=1;
include "header.php";
?>
<script type="text/javascript">
document.title=document.title + " | CREDITS";
</script>

	<?php if ($loggedin){
		include "rankcard.php"; 
		}?>
<div class="body-content">
		<table class="credits">
			<tr>
				<td class="first" rowspan="1">Concept</td>
				<td><a href="http://www.orkut.com/Profile.aspx?uid=2729739825278822284">CodeCracker , NIT Durgapur</a>
			</tr>
			<tr><td colspan="4" style="border-top:1px solid #ddd;height:0px"></dt></tr>
			<tr>
				<td class="first" rowspan="2">Present Developers</td>
				<td><a href="http://facebook.com/anirban.nick">Anirban Das</a></td>
				<td>Backend</td>
			</tr>
			<tr>
				<td><a href="http://www.facebook.com/hemantmaheshwar">Hemant Kumar</a></td>
				<td>Frontend</td>
			</tr>
			
			<tr><td colspan="4" style="border-top:1px solid #ddd;height:0px"></dt></tr>
			<tr>
				<td class="first" rowspan="3">Problem Setters</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<?php if($loggedin)
			echo "</div>";
		?>
</div>

<?php include "footer.php"; ?> 
</body>
</html>

