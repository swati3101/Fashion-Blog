<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

if($conn)
{
	header("Location: firstpage.php");
}

$username=$_POST["uname"];
$password=$_POST["psw"];
$name=$_POST["name"];
$email=$_POST["mail"];

$sql="INSERT INTO user.userrecord(username,password,name,email) VALUES('$username','$password','$name','$email')";

if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>