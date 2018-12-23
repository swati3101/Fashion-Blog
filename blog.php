<html>

<head>

<title>blog</title>
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
<a href="firstpage.php"><img src="image/home.jpg" style="height:30px;width:30px;" align="right"></img> &nbsp; </a> &nbsp;
</div>
<br><br><br>
</center>

<center>
<font style="align:center;color:purple;size:40px;family:calibri;">
<?php

    $servername="localhost";
    $username="root";
    $password="";

    $conn=mysqli_connect($servername,$username,$password);

    if(!$conn)
    {
	    die("connection failed: ".mysqli_connect_error());
    }
 
    $result = mysqli_query($conn , "SELECT * FROM user.blog");

echo "<table border='0' width='80%' align='center'  cellspacing='10px' cellpadding='15px'>
<tr>
<th></th>
<th></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td style='align:center;color:black;width:10%;font-family:cambria;font-size:20px;'><b>" . $row['username'] . "<b></td> &nbsp; ";
echo "<td style='align:center;color:purple;width:70%;font-family:cambria;font-size:20px;'>" . $row['content'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

?>
</div>
</font>
</center>

<br><br><br><br><br><br><br><br><br><br>

<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>

</body>

</html>