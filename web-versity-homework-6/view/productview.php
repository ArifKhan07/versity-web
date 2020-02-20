<?php
include("../db/config.php");
$sql="SELECT * FROM product ";
$Result=mysqli_query($myconn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product View</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style type="text/css">
.addproduct:hover{
	color: white!important;
	background: red;
	opacity: 1;

}
	</style>
</head>
<body>
<div class="menu">
  <span><a href="view.php">viewPage</a></span>
  <span><a href="signup.php">Signup</a></span>
  <span><a href="addProduct.php">addProductPage</a></span>
  <span><a href="productview.php">All Product</a></span>
 </div>


<?php
while($row=mysqli_fetch_array($Result))
{ 
$id=$row['pro_id'];
$pname=$row['pro_name'];
$img_path=$row['img_path'];
$pro_price=$row['pro_price'];

echo '
<div style=" width: 200px;
    height: 295px;
    border: 1px solid black;
    padding: 7px;
    margin: 2px;
    text-align: center;
    font-size: large;
    text-transform: capitalize;
    float:left;">
	<div class="product-img"><a href="'.$img_path.' ?id='.$id.'"><img src="'.$img_path.' "width="200px" height="200px"> </a><br></div>
	<div class="product-name">'.$pname.'</div>
	<div class="product-price">Price :'.$pro_price.' </div><br>
	<a  class="addproduct" href="http://localhost/rowphp/view/singleProductView.php?id='.$id.'" style="border:1px solid black;
	            padding:2px;
	            margin : 2px;
	            text-decoration:none;
	            color : black;
	            text-align: center;
			    padding: 8px 16px;
			    margin-right: auto;
			    margin-left: auto;
			    border:1px solid red;
   				}">View details</a>

</div>';

}
?>

</body>
</html>


