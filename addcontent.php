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
  
  $sql="SELECT name FROM user.userrecord WHERE username='$username'";

$result = $conn->query($sql);
  
 ?>

<html>

<head>

<title>addcontent</title>
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
<font style="family:cambria;size:25px;color:purple;">
<b>
<br><br>
<center>

<?php

  $content=$_POST["content"];
  
  $sql="INSERT INTO user.blog(username,content) VALUES('$username','$content')";
  
  if (mysqli_query($conn, $sql)) {
      echo "Your blog has been posted";
   } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<br><br>
<b><a href="userpage.php">Back to homepage</a></b>

</center>
</b>
</font>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>

</html>