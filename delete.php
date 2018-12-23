<?php

session_start();

$con=mysqli_connect('localhost','root','','user');

$username=$_SESSION["USER"];
	$sql="DELETE FROM userrecord WHERE username='$username'";
	mysqli_query($con,$sql);

$con->close();
header("Location:firstpage.php");
?>