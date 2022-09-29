<?php
session_start();
                 $fname=$_SESSION['fname']=$_POST['firstname'];
                $lname=$_SESSION['lname']=$_POST['lastname'];
                $id_name=$_SESSION['id_name']=$_POST['id_name'];
                $id=$_SESSION['id']=$_POST['ID'];
                $dob=$_SESSION['dob']=$_POST['dob'];
                $place_ob=$_SESSION['place_ob']=$_POST['pob'];
                $gender=$_SESSION['gender']=$_POST['gender'];
                $c_hno=$_SESSION['c_hno']=$_POST['c_hno'];
                $c_str=$_SESSION['c_str']=$_POST['c_str'];
                $c_city=$_SESSION['c_city']=$_POST['c_city'];
                $c_state=$_SESSION['c_state']=$_POST['c_state'];
                $c_country=$_SESSION['c_country']=$_POST['c_country'];
                $c_pin=$_SESSION['c_pin']=$_POST['c_pin'];
                $p_hno=$_SESSION['p_hno']=$_POST['p_hno'];
                $p_str=$_SESSION['p_str']=$_POST['p_str'];
                $p_city=$_SESSION['p_city']=$_POST['p_city'];
                $p_state=$_SESSION['p_state']=$_POST['p_state'];
                $p_country=$_SESSION['p_country']=$_POST['p_country'];
                $p_pin=$_SESSION['p_pin']=$_POST['p_pin'];
                $co_hno=$_SESSION['co_hno']=$_POST['co_hno'];
                $co_str=$_SESSION['co_str']=$_POST['co_str'];
                $co_city=$_SESSION['co_city']=$_POST['co_city'];
                $co_state=$_SESSION['co_state']=$_POST['co_state'];
                $co_country=$_SESSION['co_country']=$_POST['co_country'];
                $co_pin=$_SESSION['co_pin']=$_POST['co_pin'];
                $country_code=$_SESSION['country_code']=$_POST['country_code'];
                $phone=$_SESSION['phone']=$_POST['phone'];
                $email=$_SESSION['email']=$_POST['email'];
		
                $_SESSION['name']=$name=$fname." ".$lname;
                $_SESSION['phone']=$phone=$country_code.$phone;
                $curr_address=$c_hno.$c_str.$c_city.$c_state.$c_country.strval($c_pin);
                $perm_address=$p_hno.$p_str.$p_city.$p_state.$p_country.strval($p_pin);
                $comm_address=$co_hno.$co_str.$co_city.$co_state.$co_country.strval($co_pin);
                
function validate_email($email) {
        return (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $email)) ? FALSE : TRUE;
}

function validate_id($id_name,$id) {
        
if(strcmp($id_name,"Passport")==0){
	return (!preg_match("/^[A-PR-WYa-pr-wy][1-9]\\d\\s?\\d{4}[1-9]$/", $id)) ? FALSE : TRUE;
}elseif(strcmp($id_name,"PAN")==0){
	return (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}+$/", $id)) ? FALSE : TRUE;
}else{
	return (!preg_match("/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/", $id)) ? FALSE : TRUE;
}
}


function validate_phone($phone){
	return (!preg_match("/^\+[0-9]{12}+$/",$phone)) ? FALSE : TRUE;
}


function validate_pin($pin,$country){
if(strcmp($country,"United States of America")==0){
	return (!preg_match("/^[0-9]{5}(?:-[0-9]{4})?$/", $pin)) ? FALSE : TRUE;
}elseif(strcmp($country,"India")==0){
	return (!preg_match("/^[1-9][0-9]{5}$/", $pin)) ? FALSE : TRUE;
}elseif(strcmp($country,"Canada")==0){
	return (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/", $pin)) ? FALSE : TRUE;
}else{
	return (!preg_match("/^[0-9]{3}[0-9]{4}$/", $pin)) ? FALSE : TRUE;
}
}


	if(validate_email($email) && validate_phone($phone) && validate_id($id_name,$id) && validate_pin($c_pin,$c_country) && validate_pin($p_pin,$p_country) && validate_pin($co_pin,$co_country)){
		
                $mys =new mysqli($_ENV['MYSQL_HOST'],$_ENV['MYSQL_USER'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DB']);
		if(!$mys){
			echo"Connection failed";
		}else{
			$q1="select * from postal_data where Country='$c_country' and State='$c_state' and Pin_code='$c_pin';";
			$q2="select * from postal_data where Country='$p_country' and State='$p_state' and Pin_code='$p_pin';";
			$q3="select * from postal_data where Country='$co_country' and State='$co_state' and Pin_code='$co_pin';";
			$q4="select * from kyc_data where name='$name' and DOB='$dob' and id_name='$id_name' and id='$id';";
			$r1=$mys->query($q1);
			$r2=$mys->query($q2);
			$r3=$mys->query($q3);
			$r4=$mys->query($q4);
			if((($r1->num_rows)>0) & (($r2->num_rows)>0) & (($r3->num_rows)>0) &(($r4->num_rows)>0)){
				$q5="select * from customers where Email_Id='$email' and Phone_no='$phone';";
				$r=$mys->query($q5);
				if(($r->num_rows)==0){
					$q="insert into customers values('$fname','$lname','$id_name','$id','$dob','$place_ob','$gender','$curr_address','$perm_address','$comm_address','$phone','$email')";
					if($r=$mys->query($q)){
						echo "Data is inserted";
						$mys->close();
					}
				}else{header('location:http://localhost:30001/create.php');
				}
			}else{
				echo "Invalid Addresses or Invalid KYC data";
			}
		}
	}else{
		echo "Invalid Data";
	}
			
	?>