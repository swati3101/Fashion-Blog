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
$nme="SELECT name FROM user.admin WHERE username='$username'";
$user="SELECT username FROM user.admin WHERE username='$username'";
$mail="SELECT email FROM user.admin WHERE username='$username'";
$pass="SELECT password FROM user.admin WHERE username='$username'";

$res1=$conn->query($nme);
$result = $conn->query($sql);
$pri = $conn->query($user);
$pri1 = $conn->query($mail);
$res= $conn->query($pass);

$conn->close();
?>
<html>

<head>

<title>admin's</title>
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

<br><br>
<center>
<b>Select Bloggers' name to view/set permission.<br><br><br><br>
<?php
include 'dbconfig.php';
$authorName = "SELECT name FROM user.userrecord";
$author = mysqli_query( $conn , $authorName );
?>
  <form method="post">
 <label >Author</label>
 <select name="authors">
 <option>---Select Author---</option>
 <?php while($authorData = mysqli_fetch_array($author)){ ?>
 <option value="<?php echo $authorData['name'];?>"> <?php echo $authorData['name'];?>
</option>
<?php }?> 
 </select><br><br>
 <button type="submit" style="background-color:black;color:pink;width:100px;height:40px;" formaction="permit.php"><b>Change Permission</b></button> &nbsp;
 <button type="submit" style="background-color:black;color:pink;width:100px;height:40px;" formaction="delete1.php"><b>Delete Account</b></button> &nbsp;
  </form>
  <br><br><br>
  To see the list of viewers who want to contact us.<a href="admincontact.php">Click Here.</a>
</b>
</center>
</font>
<br><br><br><br><br><br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>

</html>