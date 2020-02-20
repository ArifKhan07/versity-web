<?php
include("../db/config.php");

$id = $_GET["id"];

$sql="SELECT * FROM product WHERE pro_id='$id'";
$Result=mysqli_query($myconn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product View</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
$pro_details=$row['pro_details'];
$pro_quantity=$row['pro_quantity'];


echo '
<div style=" padding: 5px;
    margin: 2px;
    display : flex;
    font-size: large;
    border : 1px solid black;
    text-transform: capitalize;">
	<div class="product-img"><a href="'.$img_path.' ?id='.$id.'"><img src="'.$img_path.' "width="400px" height="400px"> </a><br></div>
	<div style="margin: 3px;
              padding: 2px;
              text-align:center;
              ">
  <div style="float:left;font-weight:bold;">'.$pname.'</div><br>
	<div style="float:left;font-weight:bold;">Price :'.$pro_price.' </div><br>
  <div style="float:left;font-weight:bold;">Product Available :'.$pro_quantity.' </div><br><br>
  <div style="float:left;display:block;text-align:left;clear:both;">'.$pro_details.'Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industrys Standard Dummy Text Ever Since The 1500s, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book.


  Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. 

  

   </div><br><br>
	<a href="" style="border:1px solid black;
	            padding:8px 60px;
	            margin : 2px;
	            text-decoration:none;
              position: relative;
              bottom: -44px;
	            color : black;">Add to Cart</a><br><br>
  <a href="" style="border:1px solid black;
              padding:6px 20px;
              margin : 2px;
              text-decoration:none;
              color : black;
              position: relative;
              bottom: -44px;
              font-weight: bold;">Buy Now</a>
  </div>
</div>';
}
?>

</body>
</html>


