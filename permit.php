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
   $s="SELECT name FROM user.admin WHERE username='$username'";
   $r = $conn->query($s);
   
   $name=$_POST["authors"];
   $_SESSION["USERNAME"]=$name;
   
   $sql="SELECT * FROM user.userrecord WHERE name='$name'";
   $result=mysqli_query($conn , $sql);
   
   // Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysqli_fetch_assoc($result);
    $ans = $row['permission'];
   }
   mysqli_close($conn);
   
 ?>
 

<html>

<head>

<title>permit</title>
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
if ($r->num_rows > 0) {
    // output data of each row
    while($row = $r->fetch_assoc()) {
        echo  $row["name"];
    }
} else {
    echo "0 results";
}
?></b>
</font>
<a href="firstpage.php" style="link-color:peach;visited-color:pink;hover-color:magenta;active-color:light pink;"><font style="float:right;align:right;">Logout</font></a>
</div>
<br><br><br>
</center>

<center>
<font style="family:cambria;size:25px;color:purple;">
<b>


 <br><br>
 <form method="post">
 <?php if($ans)
	  {echo ("$name can post blogs.");?>
        <br><br>
		Do you want to change the status? 
	   <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="reset.php">YES</button> &nbsp;
	   <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="admin.php">NO</button>
	    <?php } 
		if(!($ans)) {
			echo ("$name cannot post blogs.");?>
			<br><br>
			Do you want to change the status? 
			<button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="set.php">YES</button> &nbsp; 
			<button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="admin.php">NO</button>
	    <?php } ?>
		    <p id="set"></p>
 </form>
 <br><br>
</b>
</font>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>

</html>