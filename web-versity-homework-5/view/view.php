<?php
include("../db/config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title> index page</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
 <div class="menu">
  <span><a href="view.php">viewPage</a></span>
  <span><a href="signup.php">Signup</a></span>
  <span><a href="addProduct.php">addProductPage</a></span>
 </div>
</body>
</html>


<?php
$sql="SELECT * FROM std_info ";
$Result=mysqli_query($myconn,$sql);
echo'<table border="6"> <tr> 
<td>Student Id</td>
<td>Student Name</td>
<td>Email</td>
<td>Uname</td>
<td>Phone Number</td>
<td>Password</td>
<td colspan="2">Action</td>
</tr>';
while($row=mysqli_fetch_array($Result))
{  
$sid=$row['s_id'];
$name=$row['name'];
$email=$row['email'];
$uname=$row['uname'];
$phonenum=$row['phone_num'];
$passwrd=$row['password'];
$delet=$row['delet'];
 
if ($delet == 0) {

echo'<tr>
<td>'.$sid.'</td>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$uname.'</td>
<td>'.$phonenum.'</td>
<td>'.$passwrd.'</td>


<td><a'?> onclick='return window.confirm("Are You Sure?");' <?php  echo 'href="delete.php?id='.$sid.'">Delete</a></td>
<td><a href="updateform.php?id='.$sid.'">edit</a></td>

</tr>';
}
}

?>
</table>