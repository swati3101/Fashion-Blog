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

//$username=$_POST["uname"];
$username=$_SESSION["USER"];
$sql="SELECT name FROM user.userrecord WHERE username='$username'";

$result = $conn->query($sql);


$trysql="SELECT * FROM user.userrecord WHERE username='$username'";
   $tryresult=mysqli_query($conn , $trysql);
   
   // Mysql_num_row is counting table row
$count=mysqli_num_rows($tryresult);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysqli_fetch_assoc($tryresult);
    $ans = $row["permission"];
   }
?>

<html>

<head>

<title>update</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

</head>

<body>


<center>
<div class="topnav">
<img src="image/logo.jpg" align="left" style="height:120px;width:200px;"> 
<font style="align:center;font-size:40px;font-family:Segoe Script;color:purple;"><b><u>Fashion Blog</u></b></font>
</div>

<div class="article1">
<font style="font-family:Segoe Script;align:center;"><b>Hello 
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  $row["name"];
    }
} else {
    echo "0 results";
}
?></b>
</font>
<a href="firstpage.php" style="link-color:peach;visited-color:pink;hover-color:magenta;active-color:light pink;"><font style="float:right;align:right;">Logout</font></a>
</div>
</center>
 

<br><br><br>
<center>
<font style="family:cambria;size:30px;color:purple;"><b>Enter the new details:<br>Username cannot be altered.</b></font>
</center>
<br><br>

<form name="form" method="post" align="center">
<table align="center">
	  <tr><td>
      <label for="uname"><b>Username :</b></label></td>
      <td><input type="text" placeholder="Enter Username" name="uname" required></td></tr>
      <tr><td>
      <label for="psw"><b>Password :</b></label></td>
      <td><input type="password" placeholder="Enter Password" name="psw" required></td></tr>
	  <tr><td>
      <label for="name"><b>Name :</b></label></td>
      <td><input type="text" placeholder="Enter Name" name="name" required></td></tr>
	  <tr><td>
      <label for="mail"><b>E-mail :</b></label></td>
      <td><input type="email" placeholder="Enter E-mail" name="mail" required></td></tr>
	  </table>
	  
        
      <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="updaterecord.php"><b>Submit<b></button>
</form>

</body>
</html>