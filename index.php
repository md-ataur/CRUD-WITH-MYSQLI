<?php 
	include 'inc/header.php';
	$db = new Database();
	$query = "SELECT * FROM tbl_data";
	$result = $db->read($query);
?> <!-- Data fetch and show -->


<?php	

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM tbl_data WHERE id = $id";
		$del = $db->delete($query);

	}	
?> <!-- Data Delete -->


<?php		
	if(isset($db->error)){
		echo $db->error;
	}elseif (isset($_GET['msg'])) {
		echo "<p style='color:green'>".$_GET['msg']."</p>";
	}	
?>		
<div class="main">
	<table class="tblone">
		<tr>
			<th>SL No</th>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Skill</th>
			<th>Action</th>
		</tr>
		<?php
			if($result){
				$i = 0;
				while ($data = $result->fetch_assoc()) {
					$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['username']?></td>
			<td><?php echo $data['email']?></td>
			<td><?php echo $data['skill']?></td>
			<td><span><a href="update.php?id=<?php echo urldecode($data['id']);?>">Edit</a></span>&nbsp;<span><a href="index.php?id=<?php echo $data['id'];?>">Delete</a></span></td>
		</tr>
		<?php 
			}
		} else{
			echo "No Data found";
		}
		?>
	</table>
	<a class="btn" href="create.php">Create</a>&nbsp; <a class="btn" href="index.php">Refresh</a>
</div>




<?php //include 'inc/footer.php'; ?>