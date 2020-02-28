<?php
$host="localhost";
$uname="root";
$password="";
$dbname="student";
$myconn=mysqli_connect($host,$uname,$password,$dbname);


if(mysqli_connect_error() == true)
{ 
echo mysqli_connect_error();
}

?>