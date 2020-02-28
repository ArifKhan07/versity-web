
<?php


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style type="text/css">
	#form{
		margin-top: 30px;
		border: 2px solid black;
		padding: 30px;
		width: 30%;
		margin:auto; 
	}
	#form span{
	    display: block;
		justify-content: center;	
		align-items: center;
		width: 100%!important;
	}
</style>
</head>

<body>
<?php  include("menu.php");?>

<form id="form" name="" action="../model/usercheck.php" method="POST">
<span></span>User Role:<br>
<select name="roll">
	<option value="admin">Admin </option>
	<option value="teacher">Teacher</option>
	<option value="student">Student</option>
</select ></span><br><br>
<span></span>User name:<br>
<input  type="text"id="" name="uname" ></span><br><br>
<span>Password:<br>
<input  type="password" id="" name="pass" ></span><br><br>
<input type="submit" value="Login"><br>



</form>
</body>
</html>
