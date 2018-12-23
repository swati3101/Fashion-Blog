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

$username=$_SESSION["USER"];

/*$username=$_POST["uname"];*/
$sql="SELECT name FROM user.admin WHERE username='$username'";

$result = $conn->query($sql);


?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>contact</title>
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

$s = "SELECT * FROM user.contactus";
$res = $conn->query($s);

echo "<table border='0' width='20%' align='center'  cellspacing='5px' cellpadding='15px'>";

while($row = mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td style='align:center;color:black;width:10%;font-family:cambria;font-size:20px;'><b>" . $row['Name'] . "<b></td> &nbsp; ";
echo "<td style='align:center;color:purple;width:70%;font-family:cambria;font-size:20px;'>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";

$conn->close();
?>


</font></center>
<br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>
</body>
</html>