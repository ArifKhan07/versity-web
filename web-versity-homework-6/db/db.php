<?php
$host="localhost";
$uname="root";
$password="";

$myconnect=mysqli_connect($host,$uname,$password);
$sql="CREATE DATABASE student";
$result=mysqli_query($myconnect,$sql);
if($result===TRUE)
{ 
echo "database created ";
}
else{
	echo connect_error();
}


?>