<?php 
	include 'inc/header.php';
	$db = new Database();
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_data WHERE id= $id";
	$value = $db->read($query)->fetch_assoc();		
?> <!-- Data read -->

<?php
	if (isset($_POST['update'])) {
		$result = $db->update($id, $_POST);
	}
?> <!-- Data Update -->


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
				<td><input type="text" name="name" value="<?php echo $value['name']?>" /></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" value="<?php echo $value['username']?>" /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $value['email']?>"/></td>
			</tr>
			<tr>
				<td>Skill:</td>
				<td><input type="text" name="skill" value="<?php echo $value['skill']?>"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	<a class="btn" href="index.php">Back</a>
	
</div>




<?php //include 'inc/footer.php'; ?>