<?php

session_start();

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

if($conn)
{
}
else
	die("Connection failed: " . mysqli_connect_error());

   $name=$_SESSION["USERNAME"];
   
   $sql="UPDATE user.userrecord SET permission='0' WHERE name='$name'";
   
   if (mysqli_query($conn, $sql)) {
    header("Location:admin.php");
} 
  else {
    
}
   
   mysqli_close($conn);

?>