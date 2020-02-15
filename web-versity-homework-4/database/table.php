<?php
require_once("config.php");




//employee table creation
$tbl_employee="CREATE TABLE IF NOT EXISTS employee(
e_id INT (10) NOT NULL,
PRIMARY KEY (e_id),
e_name VARCHAR  (10) NOT NULL,
e_address VARCHAR (20) NOT NULL,
e_phone_num VARCHAR (11) NOT NULL,
e_job VARCHAR  (10) NOT NULL,
e_salary VARCHAR  (10) NOT NULL)";
$result2=mysqli_query($myconn,$tbl_employee);



//patient table creation
$tbl_patient="CREATE TABLE IF NOT EXISTS patient(
p_id INT (11) NOT NULL, PRIMARY KEY (p_id),
e_id INT (10) NOT NULL,
address VARCHAR (20) NOT NULL,
name VARCHAR  (10) NOT NULL,
phone_num VARCHAR (11) NOT NULL,
d_o_add VARCHAR  (10) NOT NULL,
d_o_dis VARCHAR  (10) NOT NULL,
FOREIGN KEY (e_id) REFERENCES employee (e_id))";
$result1=mysqli_query($myconn,$tbl_patient);




//doctor table creation
$tbl_doctor="CREATE TABLE IF NOT EXISTS doctor(
p_id INT (11) NOT NULL,
e_id INT (10) NOT NULL,
doc_name VARCHAR (15) NOT NULL,
doc_sp VARCHAR (20) NOT NULL,
FOREIGN KEY (e_id) REFERENCES employee (e_id),
FOREIGN KEY (p_id) REFERENCES patient (p_id))";
$result3=mysqli_query($myconn,$tbl_doctor);


// nurse table creation
$tbl_nurse="CREATE TABLE IF NOT EXISTS nurse(
p_id INT (11) NOT NULL,
e_id INT (10) NOT NULL,
nurse_name VARCHAR (15) NOT NULL,
FOREIGN KEY (e_id) REFERENCES employee (e_id),
FOREIGN KEY (p_id) REFERENCES patient (p_id))";
$result4=mysqli_query($myconn,$tbl_nurse);




if($result1  ===TRUE)
{ 
echo"<span style='font-size:2em;'>table created  </span>";
}
if($result2 ===TRUE)
{ 
echo"<span style='font-size:2em;'>table created  </span>";
}
if($result3 ===TRUE)
{ 
echo"<span style='font-size:2em;'>table created  </span>";
}
if($result4 ===TRUE)
{ 
echo"<span style='font-size:2em;'>table created  </span>";
}
else{
   echo"<span style='font-size:2em;'>Table Not created  </span>";
}
?>