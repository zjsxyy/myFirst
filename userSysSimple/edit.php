<?php
require_once 'config.php';

if(!empty($_POST['edit'])){
	if(!empty($_POST['id']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['age'])){
		if($user->isExist($_POST['firstName'],$_POST['lastName'])){
			echo "Error: this user had existed!";
			echo "<br/><a href='list.php'>Back</a>";
			exit();
		}
		$user->update($_POST['id'],$_POST['firstName'],$_POST['lastName'],$_POST['age']);
		echo "<script> window.location.href='list.php'</script>";
	}else{
		echo "Error: input error";
		echo "<br/><a href='list.php'>Back</a>";
		exit();
	}
}else if($_GET['id']){
	$_user= $user->find($_GET['id']);
	if(!empty($_user)){
?>
<h3>Edit</h3>
<form action ="edit.php" method="post">
	<input type="hidden" name="id" value="<?php echo $_user['id']?>" />
	<table>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="firstName" value="<?php echo $_user['firstName']?>"/></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="lastName" value="<?php echo $_user['lastName']?>"/></td>
		</tr>
		<tr>
			<td>Age:</td>
			<td><input type="text" name="age" value="<?php echo $_user['age']?>"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="edit" value="eidt"/></td>
			<td><a href="list.php">List</a></td>
		</tr>
	</table>
</form>
<?php 
	}else{
		echo "Error: this user is not existed.";
		echo "<br/><a href='list.php'>Back</a>";
		exit();
	}
}else{
	echo "<script> window.location.href='list.php'</script>";
	exit();
}
?>