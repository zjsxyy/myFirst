<script>
	window.onload = function(){
		if(!document.getElementsByClassName) return false;
		var links=document.getElementsByClassName('delete');
		for(var i=0;i<links.length;i++){
			links[i].onclick=function(){
				$question="Do you really want to delete this one?";
				if(!confirm($question)){
					return false;
				}
			}
		}
	}
</script>

<?php
require_once('config.php');
?>
<h3>List</h3>
<table border="1">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Age</td>
		<td>Operation</td>
	</tr>
	<?php
		$users=$user->findAll();
		if(!empty($users)){
			foreach ($users as $value) {
	?>
			<tr>
				<td><?php echo $value['firstName']; ?></td>
				<td><?php echo $value['lastName']; ?></td>
				<td><?php echo $value['age']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $value['id']; ?>">edit</a>&nbsp;
					<a class="delete" href="delete.php?id=<?php echo $value['id']; ?>">delete</a>
				</td>
			</tr>				
	<?php
			}
		}
	?>
</table>
<a href="add.php">Add User</a>

