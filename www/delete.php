<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
        $email=$_POST['Email_Id'];
        $phone=$_POST['Phone_Number'];
	$_SESSION['id']=$id=$_POST['id'];    
$mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
if(!$mys){
      echo"Connection failed";
}else{
	$q="select * from customers where Email_id='$email' and id='$id' and Phone_no='$phone';";
	$r1=$mys->query($q);
	 if($r1->num_rows>0){
           $q1="delete from customers where Email_id='$email' and id='$id' and Phone_no='$phone';";
	   $re=$mys->query($q1);
         echo "Customer data deleted successfully";
      }
      else{
        echo "Invalid Data";
      }
     $mys->close();
}
?>