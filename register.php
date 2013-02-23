<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta name="GLUG NIT-DGP" content="">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/style2.css" type="text/css">
<title>Koder's Arena - User Registration</title>
<link rel="shortcut icon" href="images/favicon.png">

<script type="text/javascript" src="js/java.js"> </script>
<script type="text/javascript" src="js/patterns.js"> </script>
<script type="text/javascript">
	document.title=document.title + " | User Registration";
</script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script>
        $(document).ready(function() {
                var height=$(window).height()-130;
                $("#fixed-content").height(height+"px");
        });
</script>

</head>

<body onload="getImg()">

	<div class="header">

		<div class="header-content">
		<div class="logo">
			<a href="<?php if($loggedin)
				echo "home.php?t=".$t;
					    else
					echo "index.php"; ?>" >
				<img src="images/ka-logo.png" alt="ka-logo" title="koder's arena">
			</a>
		</div>
			<div class="bar">
				<ul>
					<br/><li><a href="index.php?t=1255265506" title="Home">Compete</a></li>
					<li><a href="score.php?t=1255265506" title="Score Card">Score Card </a></li>
					<li><a href="compiler_stat.php?t=1255265506" title="Judge Status">Judge Status</a></li>
					<li><a href="htdocs/faq.php?t=1255265506" title="FAQ">FAQs</a></li>
					<li><a href="contact.php?t=1255265506" title="Contact us">Contact Us </a></li>
					<li><a href="http://athena.nitc.ac.in/kh/questionanswer" target="_blank">Disscussion Forum </a></li>
					<li class="active"><a href="#">Registration</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="dummy"></div>
	<div id="fixed-content">
	<div class="body-content">
		<div class="registration">
			<div class="registration-top">
				<p>New User Registration</p>
			</div>
				
			<form action="reg_user.php" method="POST" enctype="application/x-www-form-urlencoded" name="regform" onsubmit="return validate1('user','pass','repass','mail','fname','rno','mob','dep','college','yr')">
	
			<table>
				<tbody>
			
				<tr>
					<td colspan="3">&nbsp; </td>
				</tr>
				<tr>
					<td>Username :</td>
					<td>
						<input maxlength="16" name="username" id="user" type="text" onchange="check_availability()">&nbsp;*
					</td>
		
					<td>
						<!--<input name="button" onclick="check_availability()" value="Check Availability" type="button">-->
						<div id="usererror" style="display:inline-blok"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td >&nbsp;</td>
				</tr>
				<tr>
					<td >User Password :</td>
					<td >
						<input maxlength="16" name="pass1" id="pass" type="password">&nbsp;*
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Re-type Password :</td>
					<td >
						<input maxlength="16" name="pass2" id="repass" type="password" onchange="passwdmatch()">&nbsp;*
					</td>
					<td> <div id="passerror" style="display:inline-block"></div>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Email ID :</td>
					<td >
						<input name="email" id="mail" type="text" onchange="verifyEmail(this.value)">&nbsp;*
					</td>
					<td>
						<div id="mailerror" style="display:inline-block"></div>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >First Name :</td>
					<td >
						<input maxlength="20" name="firstname" id="fname" type="text">&nbsp;*
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Last Name :</td>
					<td >
						<input maxlength="20" name="lastname" type="text">&nbsp;*
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Sex :</td>
					<td >
						<input checked="checked" name="sex" value="M" selected="selected" type="radio">
						Male&nbsp;&nbsp;
						<input name="sex" value="F" type="radio">
						Female
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >College :</td>
					<td >
						
						<select name="college" id="college">
							<option selected="selected" value="">-Select-</option>
							<option value="NITC">National Institute of Technology, Calicut</option>
						</select>				
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Roll No :</td>
					<td >
					<input maxlength="10" name="roll" id="rno" type="text" onchange="checkRoll()">&nbsp;*
					</td>
					<td><div style="display:inline-block" id="rollerror"></div></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Department :</td>
					<td >
						<select name="dep" id="dep">
							<option selected="selected" value="">-Select-</option>
							<option value="BT">BT</option>
							<option value="CSE">CSE</option>
							<option value="CE">CE</option>
							<option value="CHE">CHE</option>
							<option value="EE">EE</option>
							<option value="ECE">ECE</option>
							<option value="IT">IT</option>
							<option value="ME">ME</option>
							<option value="MME">MME</option>
							<option value="MCA">MCA</option>
							<option value="MBA">MBA</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td >Year :</td>
					<td width="70%">
						<select name="year" id="yr">
							<option selected="selected" value="">-Select-</option>
							<option value="First">First</option>
							<option value="Second">Second</option>
							<option value="Third">Third</option>
							<option value="Fourth">Fourth</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Mobile No : </td>
					<td>+91<input maxlength="10" name="mobile" id="mob" type="text" onchange="checkMobile()"></td>
					<td><div id="moberror"></div></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Enter text shown:</td>
					<td align="left">
						<div id="captcha"><img src="" id="secImg"/>
								<div id="reload-img-div"><img src="images/reload-img.png" onclick="reloadImg()" id="reload-img"><br>
								</div>
						</div>
						<div style="position:absolute; margin-top:13px;display:inline;padding-left:10px;">
							<input size="8px" maxlength="20" name="imgno" id="imgNo" type="text"/>&nbsp;*
						</div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>(Letters are not case sensitive)</td>
				</tr>
				<tr>
					<td></td>
					<td>By clicking on 'Register' below, you are agreeing to the Terms of Service of the Program as well as the Privacy Policy.
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td  align="right">
						<input name="reg_page" value="true" type="hidden">
						<input name="Reset" value="Reset" type="reset">
					</td>
					<td  align="left">
						<input name="submit" value="Register" type="submit">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				</tbody>
			</table>
	
			</form>
		</div>
	</div>
	<br>
<?php include "footer.php" ?>


</body>
</html>
