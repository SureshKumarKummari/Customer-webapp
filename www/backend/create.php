<?php
session_start();
		echo $_SESSION['fname']."\n";
                echo $_SESSION['lname']."\n";
		echo '<br><br>';
                echo $_SESSION['id_name']."\n";
                echo $_SESSION['id']."\n";
		echo '<br><br>';
                echo $_SESSION['dob']."\n";
		echo '<br><br>';
                echo $_SESSION['place_ob']."\n";
		echo '<br><br>';
                echo $_SESSION['gender']."\n";
             	echo '<br><br>';
                #$_SESSION['phone']=$phone=$_SESSION['country_code'].$_SESSION['phone'];
                $_SESSION['curr_address']=$curr_address=$_SESSION['c_hno'].", ".$_SESSION['c_str'].", ". $_SESSION['c_city'].", ".$_SESSION['c_state'].", ".$_SESSION['c_country'].", ".$_SESSION['c_pin'];
                $_SESSION['perm_address']=$perm_address=$_SESSION['p_hno'].", ".$_SESSION['p_str'].", ". $_SESSION['p_city'].", ".$_SESSION['p_state'].", ".$_SESSION['p_country'].", ".$_SESSION['p_pin'];
                $_SESSION['comm_address']=$comm_address=$_SESSION['co_hno'].", ".$_SESSION['co_str'].", ". $_SESSION['co_city'].", ".$_SESSION['co_state'].", ".$_SESSION['co_country'].", ".$_SESSION['co_pin'];
		echo $_SESSION['phone'];
		echo '<br><br>';
		echo "Current Address  :  ";
		echo $curr_address."\n";
		echo '<br><br>';
		echo "Permanent Address  :  ";
		echo $perm_address."\n";
		echo '<br><br>';
		echo "Communication Address  :  ";
		echo $comm_address."\n";
		echo '<br><br>';
		echo $_SESSION['email']."\n";
		echo '<br><br>';
		echo "Customer with given data is already exist!\n";
		echo '<br><br>';
		echo "Do you want to continue?\n";
		echo '<br><br>';
		echo '<a href="create_ok.php">Yes</a><br>';
		echo '<a href="home.html">No</a>';

?>