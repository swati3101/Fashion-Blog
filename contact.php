<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

if($conn)
{
	
}
else
	die("Connection failed: " . mysqli_connect_error());

$name=$_POST["name"];
$email=$_POST["mail"];

  $sql="INSERT INTO user.contactus(name,email) VALUES('$name','$email')";

if (mysqli_query($conn, $sql)) {
	header("Location: firstpage.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>