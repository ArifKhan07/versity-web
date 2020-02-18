<?php
include("../db/config.php");

$id=$_GET['id'];
$sql="SELECT * FROM std_info WHERE s_id='$id'";
$Result=mysqli_query($myconn,$sql);
while($row=mysqli_fetch_array($Result))
{ $sid=$row['s_id'];
$name=$row['name'];
$email=$row['email'];
$uname=$row['uname'];
$phonenum=$row['phonenum'];
$pass=$row['password'];
}?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="menu">
  <span><a href="view.php">viewPage</a></span>
  <span><a href="signup.php">Signup</a></span>
  <span><a href="addProduct.php">addProductPage</a></span>
 </div>
<form id="" name="" method="POST" action="../model/update.php">

Student id:<br>
<input type="number" id="" name="sid2" value="<?php echo  $sid ?>"  readonly><br><br>
Student Name:<br>
<input type="text" id="" name="name" value="<?php echo  $name ?>"><br><br>
Student Email:<br>
<input type="email" id="" name="email" value="<?php echo $email ?>" ><br><br>
User name:<br>
<input type="text" id="" name="uname" value="<?php echo $uname ?>"><br><br>
Phone Number:<br>
<input type="text" id="" name="phnnumber" maxlength="11" value="<?php echo $phonenum ?>"><br><br>
user passwod:<br>
<input type="password" id="" name="password" value="<?php echo $pass ?>" ><br><br>
<input type="submit" onclick='return window.confirm("Are You Sure?");' value="Update now">

</form> 


</body>
</html>