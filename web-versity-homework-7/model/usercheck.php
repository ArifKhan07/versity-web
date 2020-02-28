<?php
session_start();

include("../db/config.php");
$uname=$_POST['uname'];
$pass=md5(sha1($_POST['pass']));
$uRoll=$_POST['roll'];
$sql="SELECT * FROM std_info WHERE  uname='$uname' AND password='$pass' AND userrole='$uRoll'";
$result=mysqli_query($myconn,$sql);



if(mysqli_num_rows($result) > 0)
{
	$_SESSION['uname']=$uname;
	$_SESSION['roll']=$uRoll;
	header("location:../view/view.php?Successfully_Login");
}
else
{
	echo '<p style="color:red">User name or Passwor wrong</p><br> <a href="../view/login.php"> Please Try again</a>';
}
?>