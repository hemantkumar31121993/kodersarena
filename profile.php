<?php
	include "authenticate.php";
	$profile_active=1;
	include "header.php";
	include "retrieve.php";
	$t=time();

	$action=$_POST['action'];
	$username=$_POST['username'];
	$pass=$_POST['pass'];

?>

<script type="text/javascript">
	document.title=document.title + " My Profile";
	function validate(id1,id2,id3)
	{
		if(document.getElementById(id1).value == "" || document.getElementById(id2).value == "" || document.getElementById(id3).value == "")
		{
			alert("Please fill in all the required fields");
			return false;
		}
		else
		{
			return (verifyEmail(document.getElementById('mail').value));
		}
	}
	function verifyEmail(email)
	{
		var okay=true;
		if(!(email.indexOf(".")>0) || !(email.indexOf("@")>5))
		{
			okay=false;
		}
		if( ((email.lastIndexOf(".") - email.indexOf("@")) <2) || ((email.indexOf("@") - email.indexOf("."))==1) || !(((email.charAt(0) >="A") && (email.charAt(0) <="Z")) || ((email.charAt(0) >="a") && (email.charAt(0) <="z"))) )
		{
			okay=false;
		}
		if(!okay)
		{
			alert("Your email id doesn't seem to be valid!");
			document.getElementById('mail').focus(); 
		}
		return okay;
	}

</script>

<div class="body-content">
<table class="profile-table">
    <tr>
		<td>
<!-----------------------Server Side Scripting begins--------------------------->
				<?php
					if($action=="showprofile")
					{
						showProfile();
					}
					else if($action=="editprofile")
					{
						editProfile();
					}
					else if($action=="updateprofile")
					{
						updateProfile();
					}
					else
					{
						verify();
					}

					function verify()
					{

						global $tname, $t;
						include "dbconnect.php";

						$query="select * from team ".
								"where tname=\"$tname\"";
						$result=mysql_query($query) or die(mysql_error());
						$row=mysql_fetch_array($result);
						mysql_free_result($result);

						mysql_close($conn);

						$user1=$row['user1'];
						$user2=$row['user2'];
				?>
						<form action="profile.php?t=<?php echo $t; ?>" name="verifyuser" method="post">
							<input type="hidden" name="action" value="showprofile">
							<table class="verification">
								<tr>
									<th colspan="2"  scope="col" align="center">
											Verify User
									</th>
								</tr>
								<tr>
									<td >
										Username :
									</td>
									<?php if($user2==''): ?>
									<td ><b>
										<?php echo $user1; ?></b>
										<input type="hidden" name="username" value="<?php echo $user1; ?>">
									</td>
										<?php else: ?>
									<td>
										<select name="username">
											<option value="<?php echo $user1; ?>"><?php echo $user1; ?></option>
											<option value="<?php echo $user2; ?>"><?php echo $user2; ?></option>
										</select>
									</td>
									<?php endif; ?>
								</tr>

								<tr>
									<td><div align="left">Password :</div></td>
									<td><div style="position: relative; right: 40px">
										<input type="password"	 name="pass">
									</div></td>
								</tr>

								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" value="Submit"></td>
								</tr>

						</table>
					</form>
					<?php
				}

						function editProfile()
						{
							global $username, $tname, $t;
							
							include "dbconnect.php";

							$query="select * from team ".
									"where tname=\"$tname\"";
							$result=mysql_query($query) or die(mysql_error());
							$row=mysql_fetch_array($result);
							mysql_free_result($result);
							
							if($username == $row['user1'])
							{
								$usr='user1';
							}
							else
							{
								$usr='user2';
							}

							$query="select * from user ".
									"where username=\"$username\"";
							$result=mysql_query($query) or die(mysql_error());
							$row=mysql_fetch_array($result);
							mysql_free_result($result);

							mysql_close($conn);
							
							
					?>
					<form method="post" action="profile.php?t=<?php echo $t; ?>" onSubmit="return validate('mail','fname','rno')">
						<table class="edit-profile">
							<th colspan="3"  scope="col" align="center">
									Edit Profile
							</th>
							

							<tr>
								<td  align="right"><p align="left">&nbsp;&nbsp;&nbsp;Handle :</p>
								</td>
								<td ><p>
									<b><?php echo $row['tname']; ?></b>
								</td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td  align="left"><p>&nbsp;&nbsp;&nbsp;Password :</p></td>
								<td ><a href="chpasswd.php?sub=team&t=<?php echo $t; ?>" class="style7">Change Password</a></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td ><p align="left">&nbsp;&nbsp;&nbsp;Username :</p></td>
								<td ><p>
									<b><?php echo $row['username']; ?></b>
								</td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td  align="left"><p>&nbsp;&nbsp;&nbsp;User Password :</p></td>
								<td ><a href="chpasswd.php?sub=<?php echo $usr; ?>&t=<?php echo $t; ?>" class="style7">Change User Password</a></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;Email ID :</span></p></td>
								<td ><INPUT TYPE="text" NAME="email" id="mail" value="<?php echo $row['email']; ?>"></td>
								<td class="important">*</td>
							</tr>

							<tr>
								<td ><p>&nbsp;&nbsp;&nbsp;First Name :</p></td>
								<td ><p>
								<INPUT TYPE="text" MAXLENGTH="20" NAME="firstname" value="<?php echo $row['fname']; ?>"id="fname"></p></td>
								<td class="important">*</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;Last Name :</span></p></td>
								<td ><p>
								<INPUT TYPE="text" MAXLENGTH="20" NAME="lastname" value="<?php echo $row['lname']; ?>">
								</p></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;Sex :</span></p></td>
								<td ><p><B><?php echo $row['sex']; ?></B>
								</p></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;College :</span></p></td>
								<td ><p>
									<INPUT TYPE="text" NAME="college" id="college" value="<?php echo $row['college']; ?>"></p>
								</td>
								<td class="important">*</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;Roll No :</span></p></td>
								<td ><p>
									<INPUT TYPE="text" MAXLENGTH="10" NAME="roll" id="rno" value="<?php echo $row['roll']; ?>"></p>
								</td>
								<td class="important">*</td>
							</tr>

							<tr>
								<td ><p><span>&nbsp;&nbsp;&nbsp;Department :</span></p></td>
								<td ><p>
									<INPUT TYPE="text" MAXLENGTH="20" NAME="dep" value="<?php echo $row['dep']; ?>">
								</p></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td ><p>&nbsp;&nbsp;&nbsp;Year :</p></td>
								<td ><p>
									<SELECT NAME="year" id="yr">
										<option selected="selected" value="">-Select-</option>
										<option value="First">First</option>
										<option value="Second">Second</option>
										<option value="Third">Third</option>
										<option value="Fourth">Fourth</option>
									</SELECT>
									</p>
								</td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td>&nbsp;&nbsp;&nbsp;Mobile No : </td>
								<td><INPUT TYPE="text" MAXLENGTH="20" NAME="mobile" value="<?php echo $row['mobile']; ?>"></td>
								<td class="important">&nbsp;</td>
							</tr>

							<tr>
								<td colspan="3"><div align="center"><input type="submit" value="Update Profile"></div></td>
							</tr>
					</table>
					<input type="hidden" name="username" value="<?php echo $username; ?>">
					<input type="hidden" name="action" value="updateprofile">
				</form>
				<?php
				}

					function showProfile()
					{
						//echo "In showprofile";
						
						global $username, $pass, $t;
						
						include "dbconnect.php";
						
						$query="select * from user ".
								"where username=\"$username\"";
						$result=mysql_query($query) or die(mysql_error());
						$row=mysql_fetch_array($result);
						mysql_free_result($result);
						
						mysql_close($conn);

						if(!($row['password'] == $pass))
						{
							echo "<table align=\"center\" width=\"509\" border=0 cellpadding=0 cellspacing=0 class=\"error\">";
							echo "<tr><td align=\"center\"><h3><b>Error 403:</b>The user password is Invalid!</h3></tr></td>";
							echo "<tr><td><div align=\"center\"><input name=\"back\" type=\"button\" onClick=\"window.history.go(-2)\" value=\"Back\"></div></td></tr>";
							echo "<tr><td>&nbsp;</td></tr></table>";
						}
						else
						{
				?>
							<form action="profile.php" method="POST">	
								<table class="user-profile">
									<tr>
										<th colspan="3"  scope="col" align="center">
												User Profile
										</th>
									</tr>
									<tr>
										<td  align="right"><p align="left">&nbsp;&nbsp;&nbsp;Handle :</p></td>
										<td  class="bold"><p>
											<b><?php echo $row['tname']; ?></b>
										</td>
									</tr>
									<tr>
										<td  align="right"><p align="left">&nbsp;&nbsp;&nbsp;Username :</p></td>
										<td  class="bold"><p>
											<b><?php echo $row['username']; ?></b>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;Email ID :</span></p></td>
										<td  class="bold"><p>
										  <b><?php echo $row['email']; ?></b>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left">&nbsp;&nbsp;&nbsp;First Name : </p></td>
										<td  class="bold"><p>
											<b><?php echo $row['fname']; ?></b></p>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;Last Name :</span> </p></td>
										<td  class="bold"><p>
											<b><?php echo $row['lname']; ?></b>
										</p></td>
									</tr>
					

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;Sex :</span></p></td>
										<td  class="bold"><p>
										  <b><?php echo $row['sex']; ?></b></p>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;College :</span> </p></td>
										<td  class="bold"><p>
											<b><?php echo $row['college']; ?></b>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;Roll No :</span> </p></td>
										<td  class="bold"><p>
											<b><?php echo $row['roll']; ?></b>
										</td>
									</tr>

									<tr>
										<td  align="right"><p align="left"><span>&nbsp;&nbsp;&nbsp;Department :</span></p></td>
										<td  class="bold"><p>
											<b><?php echo $row['dep']; ?></b>
										</p></td>
									</tr>

									<tr>
										<td  align="right"><p align="left">&nbsp;&nbsp;&nbsp;Year : </p></td>
										<td  class="bold"><p>
											<b><?php echo $row['year']; ?></b>
										</p></td>
									</tr>

									<tr>
										<td  align="right">
											<div align="left">&nbsp;&nbsp;&nbsp;Mobile No : 
											</div>
										</td>
										<td  class="bold"><b><?php echo $row['mobile']; ?></b></td>
									</tr>

									<tr>
			        
										<br>
										<form action="profile.php?t=<?php echo $t; ?>" method="post">
										<input type="hidden" value="<?php echo $username; ?>" name="username">
										<input type="hidden" value="editprofile" name="action">
										<td align="center" colspan="2">
											<input type="submit" value="Edit Profile">
										</td>
									</tr>
								</table>
							</form>
							<?php
						}
					}

					function updateProfile()
					{
						//echo "In updateprofile";
						
						$email=$_POST['email'];
						$firstname=$_POST['firstname'];
						$lastname=$_POST['lastname'];
						$college=$_POST['college'];
						$roll=$_POST['roll'];
						$dep=$_POST['dep'];
						$year=$_POST['year'];
						$mobile=$_POST['mobile'];
						$hallno=$_POST['hallno'];
						$roomno=$_POST['roomno'];
						$regno=$_POST['regno'];
	
						global $username, $t;
	
						include "dbconnect.php";
					
						$query="update user ".
								"set fname='$firstname' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
								
						$query="update user ".
								"set email='$email' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
					
						$query="update user ".
								"set lname='$lastname' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
						
						
						
						$query="update user ".
								"set regno='$regno' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
			
						$query="update user ".
								"set college='$college' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
					
						$query="update user ".
								"set roll='$roll' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
					
						$query="update user ".
								"set dep='$dep' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
					
						$query="update user ".
								"set year='$year' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
					
						$query="update user ".
								"set mobile='$mobile' ".
								"where username='$username'";
						mysql_query($query) or die(mysql_error());
						
						mysql_close($conn);
						
						echo "<table align=\"center\" width=\"509\" border=0 cellpadding=0 cellspacing=0 class=\"error\">";
						echo "<tr><td><div align=\"center\"><b><h3>Your Profile has been updated Successfully!</h3></b></div></td></tr>";
						echo "<tr><td><div align=\"center\"><input name=\"back\" type=\"button\" onClick=\"window.history.go(-4)\" value=\"Back\"></div></td></tr>";
						echo "<tr><td>&nbsp;</td></tr></table>";	
					}
//<!-- ---------------------Server Side Scripting ends--------------------------- -->
?>
      
	 </td>
   </tr>
</table>
</div>
<?php include "footer.php"; ?> 

