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

$sql="SELECT name FROM user.userrecord WHERE username='$username'";

$result = $conn->query($sql);

?>

<html>

<head>

<title>updateblogcontent</title>
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

<form name="form" method="post" align="center">
<table align="center" cellpadding="10px">
	  <tr><td>
      <label for="bid"><b>blogid :</b></label></td>
      <td><input type="text" placeholder="Enter blogid" name="bid" style="width:80%;" required></td></tr>
      <tr><td>
      <label for="content"><b>Enter your blog content :</b></label></td>
      <td><textarea rows="5" cols="50" placeholder="Enter your blog content" name="content" required></textarea></td></tr>
	  </table>
	  
        
      <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="updateblog.php"><b>Submit<b></button>
</form>

</center>
</b>
</font>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>

</html>