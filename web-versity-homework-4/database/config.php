<?php
$host="localhost";
$uname="root";
$password="";
$dbname="hospital";
$myconn=mysqli_connect($host,$uname,$password,$dbname);


if(mysqli_connect_error())
{ 
echo mysqli_connect_error();
}
else{
	// echo "connection successful";
}
?>