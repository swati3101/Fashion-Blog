<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

if(!$conn)
{
	die("connection failed: ".mysqli_connect_error());
}

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="firststyle.css">
<title>homepage</title>

</head>
<body>
<center>
<div class="topnav">
<img src="image/logo.jpg" align="left" style="height:120px;width:200px;"> 
<font style="align:center;font-size:30px;font-family:Segoe Script;color:purple;"><b><u>Fashion Blog</u></b></font>
<font size="4" face="cambria"><b><button onclick="document.getElementById('id02').style.display='block'"><img src="image/admin.png" style="height:50px;width:50px;" align="left">Admin</button>
<button onclick="document.getElementById('id01').style.display='block'"><img src="image/login.jpg" style="height:50px;width:50px;" align="left">Login</button></b></font>
</div>
</center>

<center>
<div class="article1">
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
 </select>
 <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="author.php"><b>Submit</b></button> &nbsp;
  </form>
 </div>
</center>
 

<br>
<br>
<center>
<font style="align:center;family:cambria;color:purple;size:100px;"><b>Be able to showcase your ideas by becoming the part of our family.</b></font> 
<br><br>
<button onclick="document.getElementById('id03').style.display='block'" style="background-color:black;color:pink;width:100px;height:40px;">Sign Up</button></b></font>
</center>
<br><br><br>


<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <a href="blog.php">
    <div class="numbertext">1 / 3</div>
    <img src="image/meghan.jpg" style="width:100%">
    <div class="text">A+ Dresses Meghan Markle Packed For Her Royal Tour.</div>
	</a>
  </div>

  <div class="mySlides fade">
    <a href="blog.php">
    <div class="numbertext">2 / 3</div>
    <img src="image/delia.jpg" style="width:100%">
   <div class="text">A New Delia's Collection Is Here.</div>
   </a>
  </div>

  <div class="mySlides fade">
    <a href="blog.php">
    <div class="numbertext">3 / 3</div>
    <img src="image/holiday.jpg" style="width:100%">
    <div class="text">Holiday Fashion Trends That Will Make You Feel Like A Glam Queen. </div>
	</a>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<br><br>

<center>
<form method="post">
<font style="align:center;color:purple;size=40px;"><b>If you wish the admin to contact you, kindly click here.<br><br>
<button style="background-color:black;color:pink;width:100px;height:40px;" formaction="contact.html">Contact Us</button></b></font>
</form>
</center>

<br><br><br>
<div class="footer">
<font style="align:center;color:purple;size=40px;"><b>&copy; Urban Runway. All rights reserved.</b></font>
</div>


<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="image/login1.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	  <table>
	  <tr><td>
      <label for="uname"><b>Username</b></label></td>
      <td><input type="text" placeholder="Enter Username" name="uname" required></td></tr>
      <tr><td>
      <label for="psw"><b>Password</b></label></td>
      <td><input type="password" placeholder="Enter Password" name="psw" required></td></tr>
	  </table>
	  
        
      <button type="submit" style="background-color:black;color:pink;" formaction="checker.php"><b>Login<b></button>
    </div>
  </form>
</div>



<div id="id02" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="image/admin1.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	  <table>
	  <tr><td>
      <label for="uname"><b>Username</b></label></td>
      <td><input type="text" placeholder="Enter Username" name="uname" required></td></tr>
      <tr><td>
      <label for="psw"><b>Password</b></label></td>
      <td><input type="password" placeholder="Enter Password" name="psw" required></td></tr>
	  </table>
	  
        
      <button type="submit" style="background-color:black;color:pink;" formaction="checker1.php"><b>Login<b></button>
    </div>
  </form>
</div>


<div id="id03" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="image/signup.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	  <table>
	  <tr><td>
      <label for="uname"><b>Username</b></label></td>
      <td><input type="text" placeholder="Enter Username" name="uname" required></td></tr>
      <tr><td>
      <label for="psw"><b>Password</b></label></td>
      <td><input type="password" placeholder="Enter Password" name="psw" required></td></tr>
	  <tr><td>
      <label for="name"><b>Name</b></label></td>
      <td><input type="text" placeholder="Enter Name" name="name" required></td></tr>
	  <tr><td>
      <label for="mail"><b>E-mail</b></label></td>
      <td><input type="email" placeholder="Enter E-mail" name="mail" required></td></tr>
	  </table>
	  
        
      <button type="submit" style="background-color:black;color:pink;width:70px;height:30px;" formaction="register.php"><b>Sign up<b></button>
    </div>
  </form>
</div>



<script type="text/javascript">

    var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
	
	
</script>



</body>
</html>