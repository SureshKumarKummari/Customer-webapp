<?php       	
session_start();
                $email=$_SESSION['email'];
        	$phone=$_SESSION['phone']; 
	 	$ch=$_POST['address'];
		$hno=$_POST['p_hno'];
                $str=$_POST['p_str'];
                $city=$_POST['p_city'];
                $state=$_POST['p_state'];
                $country=$_POST['p_country'];
                $pin=$_POST['p_pin'];
echo $email.$phone;
                $address=$hno.",".$str.",".$city.",".$state.",".$country.",".strval($pin);
        $mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
        if(!$mys){
            echo"Connection failed";
        }else{
               $q="select * from postal_data where Country='$country' and State='$state' and Pin_code='$pin';";
               $r=$mys->query($q);
               if($r->num_rows>0){
                   if(strcmp($ch,"Current Address")==0){
			$q1="update customers set Current_Address='$address' where Phone_no='$phone' and Email_id='$email'";
		   }elseif(strcmp($ch,"Permanent Address")==0){
			$q1="update customers set Permanent_Address='$address' where Phone_no='$phone' and Email_id='$email'";
			 }else{
			$q1="update customers set Communication_Address='$address' where Phone_no='$phone' and Email_id='$email'";
		   }
		   $r1=$mys->query($q1);
		if($r1){
		   echo "Data Modified Successfully!";}
                   $mys->close();
               }else{
                   echo "Invalid Data";
                   }
         }
?>