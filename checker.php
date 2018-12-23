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

    $username=$_POST["uname"];
	$password=$_POST["psw"];
	
	$sql="SELECT * FROM user.userrecord WHERE username='$username'";
$result=mysqli_query($conn , $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysqli_fetch_assoc($result);
    if ( $password == $row['password']){
		$_SESSION["USER"]=$username;
		$_SESSION["NAME"]=$row['name'];
        header("Location:userpage.php");
        return true;
    }
    else {
        header("Location:unsuccessful.html");
        return false;
    }
}
else{
    header("Location:unsuccessful.html");
    return false;
}

//$username=$_POST["uname"];
$sql="SELECT name FROM user.userrecord WHERE username='$username'";
$nme="SELECT name FROM user.userrecord WHERE username='$username'";
$user="SELECT username FROM user.userrecord WHERE username='$username'";
$mail="SELECT email FROM user.userrecord WHERE username='$username'";
$pass="SELECT password FROM user.userrecord WHERE username='$username'";

$res1=$conn->query($nme);
$result = $conn->query($sql);
$pri = $conn->query($user);
$pri1 = $conn->query($mail);
$res= $conn->query($pass);

$conn->close();
	
?>

