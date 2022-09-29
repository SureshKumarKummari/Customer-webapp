<?php
	session_start();
        $_SESSION['email']=$email=$_POST['Email_Id'];
        $_SESSION['phone']=$phone=$_POST['Phone_Number'];
	$_SESSION['id']=$id=$_POST['id'];    
        $mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
        if(!$mys){
            echo"Connection failed";
        }else{
               $q="select * from customers where Email_id='$email' and id='$id'and Phone_no='$phone';";
               $r=$mys->query($q);
               if($r->num_rows>0){
                   header("location:http://localhost:30001/maddress.html");
                   $mys->close();
               }else{
                   echo "Invalid Data";
                   }
         }
?>