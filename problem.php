<?php
include "authenticate.php";
include "retrieve.php";
$t=time();

$probid=$_GET['probid'];

$prob_filename="/usr/local/codecracker/questionnaire/prob".$probid.".txt";
$prob_statement="";
if(file_exists($prob_filename))
{
	$fp=fopen($prob_filename,"r");
	while(!feof($fp))
	{
		$prob_statement=$prob_statement.fgetc($fp);
	}
	fclose($fp);
}
else
{
	$prob_statement="Question not found in the Database!";
}
include "header.php";
?>
<script type="text/javascript">
document.title=document.title + " | Problem Statement";
</script>
<script language="Javascript" type="text/javascript" src="js/edit_area/edit_area_full.js"></script>

<script language="Javascript" type="text/javascript">
// initialisation
	editAreaLoader.init({
		id: "solution"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "en"
		,syntax: "c"	
	});
	function changeLang(language) {
		editAreaLoader.init({
			id: "solution"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,allow_toggle: true
			,word_wrap: true
			,language: "en"
			,syntax: language	
		});
	}


</script>
		<?php include "rankcard.php"; ?>
	<div class="body-content">
		<div class="problemtext">
			<form name="form" method="post" action="process.php?t=<?php echo $t; ?>">
			
			<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr class="problemtextheader">
				<td>
					Problem Statement
				</td>
			</tr>
			<tr>
				<td>
					<div id="probstatement"><?php echo($prob_statement); ?>
					</div>
				</td>
			</tr>
			</table>
			<br/>
			<!--<table width="800" style="position:relative;margin:auto;border-bottom:0px;">
			<tr>
				<td><input type="radio" name="language" value="c" checked="checked" onchange="changeLang(this.value)" id="c"/><label for="c">C/C++</lable></td>
				<td><input type="radio" name="language" value="python" onchange="changeLang(this.value)" id="python"/><label for="python">Python</label></td>
				<td><input type="radio" name="language" value="java" onchange="changeLang(this.value)" id="java"/><label for="java">Java</label></td>
			</tr>
			</table> -->
			<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr  class="problemtextheader">
					<td colspan="3">
					Write Your Code Here
					</td>
				</tr>
				<tr class="lang-selector">
					<td><input type="radio" name="language" value="c" checked="checked" onchange="changeLang(this.value)" id="c"/><label for="c">C/C++</lable></td>
					<td><input type="radio" name="language" value="python" onchange="changeLang(this.value)" id="python"/><label for="python">Python</label></td>
					<td><input type="radio" name="language" value="java" onchange="changeLang(this.value)" id="java"/><label for="java">Java</label></td>
				</tr>
				<tr>
					<td colspan="3"><textarea id="solution" name="code" cols="98" rows="30"></textarea></td>
				</tr>
			</table>
			<br/>

			<br/>
			<input type="hidden" name="ProblemNo" value="<?php echo $probid; ?>" />
			<input name="Submit" type="submit" id="Submit" value="Submit"/>
			</form>
			<br/>
		</div>
	<div>


<?php include 'footer.php'; ?> 
</body>
</html>
