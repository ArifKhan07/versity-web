
<?php
//save product on the folder
if(isset($_POST['btn_upload']))
{
    $filetmp = $_FILES["img_product"]["tmp_name"];
    $filename = $_FILES["img_product"]["name"];
    $filetype = $_FILES["img_product"]["type"];
    $filepath = "../img/".$filename;

    move_uploaded_file($filetmp,$filepath);


//------------insert porduct info

$pname=$_POST['pro_name'];
$pprice=$_POST['product_price'];
$pquantity=$_POST['product_quantity'];
$product_details=$_POST['product_details'];


include("../db/config.php");
$sql="INSERT INTO product(pro_name,pro_img_name,img_path,img_type,pro_price,pro_quantity,pro_details)VALUES('$pname','$filename','$filepath','$filetype','$pprice','$pquantity','$product_details')";
$result = mysqli_query($myconn,$sql);

header("location:../view/productview.php");



}



?>