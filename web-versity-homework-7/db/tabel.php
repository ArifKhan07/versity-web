
<?php
include("config.php");
$tbl_stdinfo="CREATE TABLE IF NOT EXISTS std_info(
s_id INT (11) NOT NULL,
PRIMARY KEY (s_id),
name VARCHAR (20) NOT NULL,
email VARCHAR (20) NOT NULL,
uname VARCHAR  (10) NOT NULL,
password VARCHAR (200) NOT NULL,
phone_num VARCHAR (11) NOT NULL,
userrole VARCHAR (20) NOT NULL,
delet INT (1) NOT NULL)";
$result1=mysqli_query($myconn,$tbl_stdinfo);
if($result1===TRUE)
{ 
echo"student information tabel created  ";
}
else{
echo"student information tabel not  created  ";
}
/// REGISTRTION TABEL
$tbl_reg="CREATE TABLE IF NOT EXISTS std_reg(
s_id INT (11) NOT NULL,
det VARCHAR (20) NOT NULL,
course VARCHAR (20) NOT NULL,
FOREIGN KEY (s_id) REFERENCES std_info (s_id)
)";
$result2=mysqli_query($myconn,$tbl_reg);
if($result1===TRUE)
{ 
echo"student registration  tabel created  ";
}
else{
echo"student registration tabel not  created  ";
}
// add product table 

$tbl_product="CREATE TABLE IF NOT EXISTS product(
pro_id INT (11) NOT NULL,
PRIMARY KEY (pro_id),
pro_name VARCHAR (20) NOT NULL,
pro_img_name VARCHAR (20) NOT NULL,
img_path VARCHAR (50) NOT NULL,
img_type VARCHAR (50) NOT NULL,
pro_price VARCHAR (50) NOT NULL,
pro_quantity INT (10) NOT NULL,
pro_details VARCHAR (3550) NOT NULL
)";
$result3=mysqli_query($myconn,$tbl_product);
if($result3===TRUE)
{ 
echo"<br>product tabel created  ";
}
else{
echo"Product tabel not  created  ";
}

?>