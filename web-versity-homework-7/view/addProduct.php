<?php
include("../model/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add product</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
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
.addproduct{
    text-align: center;
    padding: 8px 16px;
    margin-right: auto;
    margin-left: auto;
    display: flex;
    align-items: center;
    border:1px solid red;
}
.addproduct:hover{
	color: white;
	background: red;
}
</style>

<body>
<?php  include("menu.php");?>

<form id="form" name="" method="POST" action="../model/addproduct.php" enctype="multipart/form-data">
<span>Product Name:
<input type="text" name="pro_name" required></span><br><br>

<span>Add Product image :
<input type="file" name="img_product" required></span><br><br>

<span>Product Price :
<input type="number" name="product_price" required></span><br><br>

<span>Product Quantity :
<input type="number" name="product_quantity" required></span><br><br>

<span>Product Details :<br>
<textarea name='product_details' cols='55' rows='10'>
	Write About your Product ................
</textarea></span><br><br>

<input type="submit" value="Add product" name="btn_upload" class="addproduct">

</form> 
</body>
</html>


