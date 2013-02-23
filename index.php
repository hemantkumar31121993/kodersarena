<?php
header("Cache-Control: no-cache, must-revalidate");
$user=$_COOKIE['userstats'];
$t=time();
if(isset($user))
{
	if($user["loggedin"])
	{
		header("Location:home.php?t=$t");
	}
}
?>
<?php $index_active=1 ?>
<?php include "header.php" ?>
		
		
		<div class="banner-content">
			<div class="banner">
				<?php include "banner.php" ?>
			</div>
		</div>
		<div class="body-content-login">	
			<div class="loginpanel">
				<h2 onclick="_open()" id="login-header">Login To The Koder's Arena&nbsp;
					<img id="down-arrow" src="images/down-arrow.png" class="down" height="30" width="30" >
				</h2>
				<div class="login_form" id="login-form">
					<form name="loginform" action="verify.php?t=<?php echo $t; ?>" method="POST">
						<table>
							<tr class="handle">
								<td><label for="tname">Handle&nbsp;</label></td>
								<td><input name="tname" type="text" id="tname"></td>
							<!--</tr>
							<tr><td style="height:2px"></td></tr
							<tr  class="password">-->
								<td>&nbsp;&nbsp;&nbsp;</td>
								<td><label for="tpass">Password&nbsp;</label></td>
								<td><input name="tpass" type="password" id="tpass"></td>
								<td>&nbsp;&nbsp;&nbsp;</td>
								<td><input name="submit"  type="submit" value="Login"></td>
							</tr>
							<!--<tr><td style="height:0px"></td></tr>
							<tr>
								<td colspan="2" align="right"><input name="submit"  type="submit" value="Login"></td>
							</tr>-->		
							<tr>
								<td colspan="6" align="center" color="#fff"><br/><span style="color:#fff">Don't have a login id,  click here to&nbsp;&nbsp;</span><a href="register.php" class="register" >Register</a></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			
			<div class="user_bar">
					<a target="_blank" href="http://twitter.com/letmeknowupdate"><img height="38" width="38" src="images/twitter-logo.png"/></a>
					<a target="_blank" href="http://friendfeed.com/lmk"><img height="38" width="38" src="images/friendfeed.png"/></a>
					<a target="_blank" href="http://www.facebook.com/pages/Let-Me-Know/36910814229/"><img height="38" width="38" src="images/facebook-logo.png"/></a>
					<a target="_blank" type="application/rss+xml" rel="alternate" title="Subscribe to the Let Me Know RSS feed" href="http://feeds.feedburner.com/letmeknow/all"><img height="38" width="38" src="images/rss-logo.png"/></a>
			</div>
		</div>
	</div>

<script>
		var _open = function(){
			$("#login-form").show("slow");
			$("#down-arrow").attr("class","up");
			$("#login-header").attr("onclick","_close()");
		}
		var _close = function(){
			$("#login-form").hide("slow");
			$("#down-arrow").attr("class","down");
			$("#login-header").attr("onclick","_open()");
		}
</script>
<?php include "footer.php";?>
