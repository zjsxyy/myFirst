<h3>Add</h3>
<form action ="add.php" method="post">
	<table>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="firstName"/></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="lastName"/></td>
		</tr>
		<tr>
			<td>Age:</td>
			<td><input type="text" name="age"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"/></td>
			<td><a href="list.php">List</a></td>
		</tr>
	</table>
</form>

<?php
if(!empty($_POST['submit'])){
	echo "ok1";
	if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['age'])){
		require_once 'config.php';
		if($user->isExist($_POST['firstName'],$_POST['lastName'])){
			echo 'Error : this user had existed!';
			echo "<br/> <a href='add.php'>Back</a>";
			exit();
		}
		$user->add($_POST['firstName'],$_POST['lastName'],$_POST['age']);
		echo "<script>window.location.href='list.php'</script>";
	}else{
		echo "Error : there is a null field!";
		echo "<br/><a href='add.php'>Back</a>";
		exit();
	}
} 
?>