<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username=$_SESSION["USER"];
//$username=$_POST["uname"];
$newname=$_POST["name"];
$newpassword=$_POST["psw"];
$newmail=$_POST["mail"];

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>update</title>
</head>
<body>

<center>
<div class="topnav">
<img src="image/logo.jpg" align="left" style="height:120px;width:200px;"> 
<font style="align:center;font-size:30px;font-family:Segoe Script;color:purple;"><b><u>Fashion Blog</u></b></font>
</div>
</center>

<center>
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
<font style="family:cambria;size:30px;color:purple;">

<?php

$sql="Update user.userrecord SET name='$newname', password='$newpassword',email='$newmail' WHERE username='$username'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<br><br>
<b><a href="userpage.php">Back to homepage</a></b>

</font></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>
</body>
</html>