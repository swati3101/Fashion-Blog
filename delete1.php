<?php

session_start();

$con=mysqli_connect('localhost','root','','user');

$name=$_POST["authors"];
	$sql="DELETE FROM userrecord WHERE name='$name'";
	mysqli_query($con,$sql);

$con->close();
header("Location:admin.php");
?>