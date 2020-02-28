<?php
session_start();
if(isset($_SESSION['uname']))
{
	header("location:../view/view.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>signup Page</title>
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

<form id="form" name="" method="POST" action="../model/insert.php">
<span>User Role:
	<select name="roll" required>
		<option value="admin">Admin </option>
		<option value="teacher">Teacher</option>
		<option value="student">Student</option>
    </select >
</span><br><br>
<span>Student id:
<input type="number" id="" name="sid" required></span><br><br>
<span>Student Name:
<input type="text" id="" name="name" required></span><br><br>
<span>Student Email :
<input type="email" id="" name="email" required></span><br><br>
<span>User name: 
<input type="text" id="" name="uname" required></span><br><br>
<span>Phone Number:
<input type="number" id="" name="phnnumber" maxlength="11" required></span><br><br>
<span>user passwod:
<input type="password" id="" name="password" required></span><br><br>
<span><input type="submit" value="Signup"></span>

</form> 
</body>
</html>