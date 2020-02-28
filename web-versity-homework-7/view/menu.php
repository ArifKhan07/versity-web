<?php

include("../db/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

 <div class="menu">
  <span><a href="view.php">viewPage</a></span>
  <span><a href="addProduct.php">addProductPage</a></span>
  <span><a href="productview.php">All Product</a></span>
  <span><?php  if(!isset($_SESSION['uname']))
                     { echo'<a href="login.php">Login</a>';}
               else{

               	    echo'<a href="../model/logout.php">Logout</a>';
               }
             ?>  	
  </span>
  <span><?php  if(!isset($_SESSION['uname']))
                     { echo'<a href="signup.php">Signup</a>';}
               else{

                    echo'<a href="#">'.$_SESSION['uname'].'</a>';
               }
             ?>   
  </span>
  <span><a href="#"><?php if (!isset($_SESSION['roll'])){echo "User";} else { echo  $_SESSION['roll'];}?></a></span>
 </div>

</body>
</html>
