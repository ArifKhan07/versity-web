<?php

session_start();
if(!isset($_SESSION['uname']))
{
	header("location:../view/login.php");
}

?>