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

$username="admin123";
$password="admin";
$name="Mr Admin";
$email="chaudharyswati3101@gmail.com";

$sql="INSERT INTO user.admin(username,password,name,email) VALUES('$username','$password','$name','$email')";

if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>