<?php
	require_once('mysql.php');
	require_once('user.php');
	$mysql=new MySql('localhost','root','root','testDB');
	$user=new User($mysql);
?>