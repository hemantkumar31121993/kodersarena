<?php

/************Check if a user is logged in*************/
$user=$_COOKIE['userstats'];
$t=time();
if(isset($user))
{
	$tid=$user["tid"];
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="GLUG NIT-DGP" content="lugcore@googlegroups.com" />
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<link rel="stylesheet" href="css/style2.css" type="text/css" />
	<title>Koder's Arena</title>
	<link rel="shortcut icon" href="images/favicon.png">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script>
		$(document).ready(function() {
			var height=$(window).height()-130;
			$("#fixed-content").height(height+'px');
		});
	</script>
</head>

<body>
	<div class="header">
		<!--<?php if ($loggedin) :?>
			<a href="logout.php?t=<?php echo $t; ?>" title="Log Out" class="logout">Log Out</a>
		<?php endif ;?>-->
		<div class="header-content">
		<div class="logo">
			<a href="<?php if($loggedin)
				echo "home.php?t=".$t;
					    else
					echo "index.php"; ?>" >
				<!--<img src="images/ka-logo.png" height="60" width="111" alt="ka-logo" title="koder's arena"> -->
				<!--<span class="koders">Koder's</span> <span class="arena">Arena</span>-->
				<img src="images/ka-logo.png" alt="ka-logo" title="koder's arena">
			</a>
		</div>
			
			<!-------- Display the following information if User in logged in ------------>
			<?php if($loggedin): ?>
			<!--<a href="logout.php?t=<?php echo $t; ?>" title="Log Out" style="float:right;background:#c00;color:#fff;vertical-align:middle;z-index:2">Log Out</a>-->
			<div class="bar">
					<ul>
						<br/><li class=<?php if($home_active) echo "active";?>><a href="home.php?t=<?php echo $t; ?>" title="Home">Home</a></li>
						<li class=<?php if($score_active) echo "active";?>><a href="score.php?t=<?php echo $t; ?>" title="Score Card">Score Card </a></li>
						<li class=<?php if($status_active) echo "active";?>><a href="status.php?t=<?php echo $t; ?>" title="Judge Status">Judge Status</a></li>
						<li class=<?php if($teams_active) echo "active";?>><a href="teams.php?t=<?php echo $t; ?>" title="Coders">Coders</a></li>
						<li class=<?php if($faq_active) echo "active";?>><a href="faq.php?t=<?php echo $t; ?>" title="FAQ">Rules</a></li>
						<li class=<?php if($profile_active) echo "active";?>><a href="profile.php?t=<?php echo $t; ?>" title="Profile">Profile</a></li>
						<li><a href="http://athena.nitc.ac.in/kh/questionanswer" target="_blank">Disscussion Forum </a></li>
						<li class="logout"><a href="logout.php?t=<?php echo $t; ?>" title="Log Out ">Log Out</a></li>
					</ul>
			</div>
			<?php else: ?>
			<div class="bar">
					<ul>
						<br/><li class=<?php if($index_active) echo "active";?>><a href="index.php">Compete</a></li>
						<li class=<?php if($score_active) echo "active";?>><a href="score.php?t=<?php echo $t; ?>" title="Score Card">Score Card </a></li>
						<li class=<?php if($status_active) echo "active";?>><a href="status.php?t=<?php echo $t; ?>" title="Judge Status">Judge Status</a></li>
						<li class=<?php if($faq_active) echo "active";?>><a href="faq.php?t=<?php echo $t; ?>" title="FAQ">FAQs</a></li>
						<li class=<?php if($contact_active) echo "active";?>><a href="contact.php?t=<?php echo $t; ?>" title="Contact us">Contact Us </a></li>
						<li><a href="http://athena.nitc.ac.in/kh/questionanswer" target="_blank">Disscussion Forum </a></li>
						<li><a href="register.php?t=<?php echo $t; ?>" title="Register Here">Registration</a></li>
					</ul>
			</div>
			
			<?php endif; ?>
		</div>

	</div>
	<div class="dummy"></div>
	<div id="fixed-content">
