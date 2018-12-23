<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>author's</title>
</head>
<body>

<center>
<div class="topnav">
<img src="image/logo.jpg" align="left" style="height:120px;width:200px;"> 
<font style="align:center;font-size:30px;font-family:Segoe Script;color:purple;"><b><u>Fashion Blog</u></b></font>
</div>
</center>

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

   $dbname = "user";
   
   mysqli_select_db($conn , $dbname);
   
   $result=$_POST['authors'];
  
   $sql1="SELECT * FROM user.userrecord WHERE name='$result'";
   $res=mysqli_query($conn,$sql1);
   $r=mysqli_fetch_array($res);
   $x=$r['username'];

$sql="SELECT name FROM user.userrecord WHERE name='$result'";
$nme="SELECT name FROM user.userrecord WHERE name='$result'";
$mail="SELECT email FROM user.userrecord WHERE name='$result'";
$username="SELECT username FROM user.userrecord WHERE name='$result'";

$res1=$conn->query($nme);
$result = $conn->query($sql);
$pri1 = $conn->query($mail);
$user = $conn->query($username);
 
?>

<center>
<div class="article1">
<font style="font-family:Segoe Script;size:50px;"><b>This is
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  $row["name"];
    }
} else {
    echo "0 results";
}
?>'s information.</b>
</font>
<a href="firstpage.php"><img src="image/home.jpg" style="height:30px;width:30px;" align="right"></img> &nbsp; </a> &nbsp;
 </div>
</center>


<br><br><br>
<center>
<font style="family:cambria;size:30px;color:purple;">



</font>
</center>
<br><br>

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
<tr>
<td><b>E-mail</b>  &emsp;</td>
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
</table>
<br><br>
<font style="align:center;color:purple;size=40px;">
</font>
<!--'".$rows['user']."'-->
<?php

$userresult = mysqli_query($conn , "SELECT content FROM blog WHERE username = '$x'");

echo "<table border='0' width='80%' align='center'  cellspacing='10px' cellpadding='15px'>";

while($row = mysqli_fetch_array($userresult))
{
echo "<tr>";

echo "<td style='align:center;color:purple;width:70%;font-family:cambria;font-size:20px;'><b style='color:purple;'>" . $row['content'] . "<b></td>";
echo "</tr>";
}
echo "</table>";

$conn->close();
?>

</center>
<br><br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>
</html>
