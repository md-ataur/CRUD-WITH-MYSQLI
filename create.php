<?php 
	include 'inc/header.php';
	$db = new Database();
	if (isset($_POST['submit'])) {
		$result = $db->insert($_POST);
	}
?> <!-- Data Insert -->


<?php		
	if(isset($db->error)){
		echo $db->error;
	}		
?>		
<div class="main">
	<form action="" method="post">
		<table class="tblone">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>Skill:</td>
				<td><input type="text" name="skill" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn" type="submit" name="submit" value="Submit">&nbsp;<input class="btn" type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	<a class="btn" href="index.php">Back</a>
	
</div>




<?php //include 'inc/footer.php'; ?>