<html>
<body>

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


     $sql = "SELECT img FROM user.try";
  $result = mysqli_query($conn , "$sql");
  $row = mysqli_fetch_assoc($result);

  header("Content-type: image/jpg");
  echo '<img src="data:image/jpg;base64,'.base64_encode( $row['img'] ).'"/>'; /*$row['img']*/;



    /*$sql = "SELECT img FROM user.try";
   $mq = mysqli_query($conn , $sql) or die ("not working query");
   $row = mysqli_fetch_array($mq) or die("line 44 not working");
   $s=$row['img'];
   echo $row['img'];

   echo '<img src="data:image/jpeg;base64,'.base64_encode( $s ).'" alt="HTML5 Icon" style="width:128px;height:128px">';
   

  /*$sql="SELECT img FROM user.try";
  $prit = $conn->query($sql);
  if ($prit->num_rows > 0) {
    // output data of each row
    while($row = $prit->fetch_assoc()) {
        echo  '<img src="data:image/jpeg;base64,'.base64_encode( $prit['img'] ).'"/>';
		
		//$result=mysqli_fetch_array($sth);
//echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    }
} else {
echo "0 results"; } */  
mysqli_close($conn);
?>

</body>
</html>