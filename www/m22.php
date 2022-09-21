<?php        	
session_start();
                $email=$_SESSION['email'];
        	$phone=$_SESSION['phone']; 
	 	$country_code=$_POST['country_code'];
		$phone1=$_POST['phone'];
                $newphone=$country_code.$phone1;
        $mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
        if(!$mys){
            echo"Connection failed";
        }else{
               if(validate_phone($newphone)){
			$q1="update customers set Phone_no='$newphone' where Phone_no='$phone' and Email_id='$email'";
		   $r1=$mys->query($q1);
		   echo "Data Modified Successfully!";
                   $mys->close();
               }else{
                   echo "Invalid Data";
                   }
         }

function validate_phone($phone){
	return (!preg_match("/^\+[0-9]{12}+$/",$phone)) ? FALSE : TRUE;
}
?>