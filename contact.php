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
$contact_active=1;
include "header.php";
?>
<script type="text/javascript">
document.title=document.title + " | Contact";
</script>


	<?php if ($loggedin){
		include "rankcard.php"; 
		}?>	
<div class="body-content">
	<div class="contact">
	<p class="contact-tag">If you have any queries regarding the format of the competition, or some technical issues contact:-</p>
	<br/>
	<table>
	<tr class="contact-header">
		<td>NAME</td>
		<td>PHONE NO</td>
		<td>EMAIL</td>
		<td>Hostel &amp; Room</td>
	</tr>  
	<tr>
		<td><a href="http://facebook.com/anirban.nick">Anirban Das</a></td>
		<td>+91-7736-485102</td>
		<td><a href="mailto:anirban.nick@gmail.com">anirban.nick@gmail.com</a></td>
		<td>C-Hostel, Room-233</td>
	</tr>
	<tr>
		<td><a href="http://jaiswalayush.blogspot.in/">Ayush Jaiswal</a></td>
		<td>+91-7736-520669</td>
		<td><a href="mailto:mail.ayush.jaiswal@gmail.com">mail.ayush.jaiswal@gmail.com</a></td>
		<td>C-Hostel, Room-226</td>
	</tr>
	<tr>
		<td><a href="http://www.facebook.com/hemantmaheshwar">Hemant Kumar</td>
		<td>+91-8547-929682</td>
		<td><a href="mailto:hemantkumar31121993@gmail.com">hemantkumar31121993@gmail.com</a></td>
		<td>B-Hostel, Room-330</td>
	</tr>
	</table>
	</div>
	
<?php if($loggedin)
	echo "</div>";
?>
</div>

<?php include "footer.php"; ?> 
</body>
</html>

