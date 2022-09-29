<?php
session_start();
$mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
if(!$mys){
echo"Connection failed";
}else{

$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$id_name=$_SESSION['id_name'];
$id=$_SESSION['id'];
$dob=$_SESSION['dob'];
$place_ob=$_SESSION['place_ob'];
$gender=$_SESSION['gender'];
$curr_address=$_SESSION['curr_address'];
$perm_address=$_SESSION['perm_address'];
$comm_address=$_SESSION['comm_address'];
$phone=$_SESSION['phone'];
$email=$_SESSION['email'];

$q="insert into customers values('$fname','$lname','$id_name','$id','$dob','$place_ob','$gender','$curr_address','$perm_address','$comm_address','$phone','$email');";
if($r=$mys->query($q)){
echo "Data inserted";
}
}
$mys->close();
?>