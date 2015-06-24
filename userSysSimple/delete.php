<?php
require_once 'config.php';

if(!empty($_GET['id'])){
	$user->delete($_GET['id']);
	echo "<script>window.location.href='list.php'</script>";
}else{
	echo "Error: this user is not existed";
	echo "<br/> <a href='list.php'>Back</a>";
}