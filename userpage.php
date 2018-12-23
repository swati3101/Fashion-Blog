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
$nme="SELECT name FROM user.userrecord WHERE username='$username'";
$user="SELECT username FROM user.userrecord WHERE username='$username'";
$mail="SELECT email FROM user.userrecord WHERE username='$username'";
$pass="SELECT password FROM user.userrecord WHERE username='$username'";
$permission="SELECT permission FROM user.userrecord WHERE username='$username'";

$res1 = $conn->query($nme);
$result = $conn->query($sql);
$pri = $conn->query($user);
$pri1 = $conn->query($mail);
$res = $conn->query($pass);
$per = $conn->query($permission);

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

<title>user's</title>
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
<form method="post">
<p align="right">
<button style="background-color:black;color:pink;align:center;height:40px;width:100px;font-size:15px;" formaction="delete.php">Delete Account</button>
</p>
</form>
<font style="family:cambria;size:25px;color:purple;">

<br><br>
<center>
<font style="color:purple;family:cambria;size:25px;">
<b><u>Your personal information is as per given below:</u><br><br>
If permission is 1, you can post blogs else you cannot.</b>
</font>
</center>

<br><br><br>

<center>
<table align="center" cellpadding="15" style="font-family:cambria;font-size:25px;">
<tr>
<td><b><font style="color:black;">Name:</font></b>  &emsp;</td>
<td><font style="color:purple;">
<?php
if ($res1->num_rows > 0) {
    // output data of each row
    while($row = $res1->fetch_assoc()) {
        echo  $row["name"];
    }
} else {
    echo "0 results";
}
?></font>
</td>
</tr>
<tr></tr><tr></tr>
<tr>
<td><b><font style="color:black;">Username:</font></b>  &emsp;</td>
<td>
<font style="color:purple;">
<?php
if ($pri->num_rows > 0) {
    // output data of each row
    while($row = $pri->fetch_assoc()) {
        echo  $row["username"];
    }
} else {
    echo "0 results";
}
?></font>
</td></tr>
<tr>
<td><b><font style="color:black;">Password:</b></font>  &emsp;</td>
<td><font style="color:purple;">
<?php
if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
        echo  $row["password"];
    }
} else {
    echo "0 results";
}
?></font>
</td></tr>
<tr>
<td><b>E-mail:</b>  &emsp;</td>
<td><font style="color:purple;">
<?php
if ($pri1->num_rows > 0) {
    // output data of each row
    while($row = $pri1->fetch_assoc()) {
        echo  $row["email"];
    }
} else {
    echo "0 results";
}
?></font>
</td></tr>
<tr>
<td><b>Permissions</b>  &emsp;</td>
<td><font style="color:purple;">
<?php
if ($per->num_rows > 0) {
    // output data of each row
    while($row = $per->fetch_assoc()) {
        echo  $row["permission"];
    }
} else {
    echo "0 results";
}
?></font>
</td></tr>
</table>
</center>
</font>
<br><br>
<center>
<form name="frm" method="post">
<font style="family:cambria;size:30px;color:black;"><b>Do you want to update your credentials?</b></font> &nbsp; <button style="background-color:black;color:pink;height:40px;width:70px;font-size:15px;" formaction="update1.php">Update</button> 
</form>

<br><br>
<font style="family:cambria;size:30px;color:black;"><b>
<form name="one" method="post">
<?php
if($ans)
	echo ("If you want to post blogs "); 
    echo "<button style='background-color:black;color:pink;height:40px;width:100px;font-size:15px;' formaction='addcontent1.php'>Click here</button>" ;
?>
</form>
<br><br>
<center>
Your blogs :<br><br>
<?php
  
 $userresult = mysqli_query($conn , "SELECT blogid, content FROM user.blog WHERE username='$username'");

echo "<table border='0' width='80%' align='center'  cellspacing='10px' cellpadding='15px'>
<tr>
<th></th>
<th></th>
</tr>";

while($row = mysqli_fetch_array($userresult))
{
echo "<tr>";
echo "<td style='align:center;color:black;width:10%;font-family:segoe script;font-size:20px;'><b>" . $row['blogid'] . "<b></td> &nbsp; ";
echo "<td style='align:center;color:purple;width:70%;font-family:cambria;font-size:20px;'><b>" . $row['content'] . "<b></td>";
echo "</tr>";
}
echo "</table>";


?>
</center>
</b>
</font>
<br><br>
<form method="post">
<font style="family:cambria;size:30px;color:black;"><b>Do you want to update your blogs?</b></font> &nbsp; <button style="background-color:black;color:pink;height:40px;width:70px;font-size:15px;" formaction="updateblog1.php">YES</button>
</center>
<br><br>

<div class="footer">
<font style="align:center;color:purple;size:40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

<?php
  $conn->close();
  ?>

</body>

</html>