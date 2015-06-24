<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
else{
	echo "connect success<br>";
}
mysql_select_db("testDB",$con);
$rs=mysql_query("select * from Persons");
while ($row = mysql_fetch_array($rs)) {
	echo $row['firstName']." ".$row['lastName'];
	echo "<br/>";
}
?>