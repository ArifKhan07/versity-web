<?php
include("../db/config.php");
$sid=$_POST['sid'];
$name=$_POST['name'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$phnnumber=$_POST['phnnumber'];
$pass=md5(sha1($_POST['password']));
$sql="INSERT INTO std_info (s_id,name,email,uname,password,phone_num) VALUES ('$sid','$name','$email','$uname','$pass','$phnnumber')";

$result=mysqli_query($myconn,$sql);


if($result===TRUE)
{
	header("location:../view/signup.php");
}
else {
    echo mysqli_error($sql);
}
?>