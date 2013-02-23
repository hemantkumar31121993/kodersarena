	<?php
include "authenticate.php";
include "retrieve.php";
$t=time();
$home_active=1;
include "header.php";
?>

<script type="text/javascript">
	document.title=document.title + " | Arena" ;
</script>
	<?php include "rankcard.php"; ?>
	<div class="body-content">
		<div class="problembox">
			<div class="problem-container">
				<table>
					<tr>
						<td id="easy"  class="problem-menu first current">Easy</td>
						<td id="medium"   class="problem-menu" >Medium</td>
						<td id="hard"   class="problem-menu last">Hard</td>
					</tr>
				</table>
				<table>
					<tr class="problem-info"> 
						<td> Problem Name</td>
						<td> Problem Id </td>
						<td> Sucessful Solutions</td>
					</tr>
				</table>
				<div id="problem-easy" class="problem-block current-challenge">
					<!-- include problem-easy.php -->
					<?php include "problems/problem-easy.php" ?>
				
				</div>
				<div id="problem-medium" class="problem-block">
					<!-- include problem-medium.php -->
					<?php include "problems/problem-medium.php" ?>

				</div>
				<div id="problem-hard" class="problem-block">
					<!-- include problem-hard.php -->
					<?php include "problems/problem-hard.php" ?>
					
				</div>
			</div>
			
		</div>
		<?php include "rightwidget.php"; ?> 
	</div>
		
<br/><br/>
 
<script src="js/jquery-1.8.2.min.js"></script>
<script>
	jQuery(document).ready(function () {
		jQuery('#easy').click(function () {
			$(this).addClass('current');
			$('#medium').removeClass('current');
			$('#hard').removeClass('current');
			$('#problem-easy').addClass('current-challenge');
			$('#problem-medium').removeClass('current-challenge');
			$('#problem-hard').removeClass('current-challenge');
		});
		jQuery('#medium').click(function () {
			$(this).addClass('current');
			$('#easy').removeClass('current');
			$('#hard').removeClass('current');
			$('#problem-medium').addClass('current-challenge');
			$('#problem-easy').removeClass('current-challenge');
			$('#problem-hard').removeClass('current-challenge');
		});
		jQuery('#hard').click(function () {
			$(this).addClass('current');
			$('#medium').removeClass('current');
			$('#easy').removeClass('current');
			$('#problem-hard').addClass('current-challenge');
			$('#problem-medium').removeClass('current-challenge');
			$('#problem-easy').removeClass('current-challenge');
		});
		/*jQuery('.current-challenge tr').mouseover(function() {
			$('.current-challenge tr>td').removeClass('normal');
			$('.current-challenge tr>td').addClass('inState');
		});
		jQuery('.current-challenge td').mouseout(function() {
			$('.current-challenge tr td').removeClass('inState');
			$('.current-challenge tr td').addClass('normal');
		});*/
	});
</script>
<?php include "footer.php"; ?>
