<?php
include("../db/config.php");
$id=$_GET['id'];
$sql="UPDATE `std_info` SET `delet`=1 WHERE s_id = '$id'";
$result=mysqli_query($myconn,$sql);
if($result===TRUE)
{
	header("location:../view/view.php");
} else {
	echo "error ".mysqli_error($myconn);
}


?>