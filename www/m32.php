<?php   	
session_start();
                $email=$_SESSION['email'];
        	$phone=$_SESSION['phone']; 
	 	$newemail=$_POST['email'];
        $mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
        if(!$mys){
            echo"Connection failed";
        }else{
               if(validate_email($newemail)){
			$q1="update customers set Email_id='$newemail' where Phone_no='$phone' and Email_id='$email'";
		   $r1=$mys->query($q1);
		if($r1){
		   echo "Data Modified Successfully!";}
                   $mys->close();
               }else{
                   echo "Invalid Data";
                   }
         }
function validate_email($newemail){
return (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $newemail)) ? FALSE : TRUE;
}
?>