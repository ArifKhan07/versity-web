<?php
include("../db/config.php");

$sid2=$_POST['sid2'];
$name=$_POST['name'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$pass=md5(sha1($_POST['password']));
$phnnumbr=$_POST['phnnumber'];
$sql="UPDATE `std_info` SET `name`='$name',`email`='$email',`uname`='$uname',`password`='$pass',`phone_num`='$phnnumbr' WHERE `s_id` = '$sid2'";
$result=mysqli_query($myconn,$sql);


  if($result === TRUE)
	{
		header("location:../view/view.php?success");
	} 
	else {
		echo "error ".mysqli_error($sql);
	}


?>