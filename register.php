<?php
$username=filter_input(INPUT_POST,'email');
$password=filter_input(INPUT_POST,'psw');
"console.log($username)";
"console.log($password)";
	if(!empty($username)){
		if(!empty($password)){
			$host="localhost";
			$dbusername="user";
			$dbpassword="password";
			$dbname="login1";
			
			//Create Connection
			$conn=new mysqli ($host,$dbusername, $dbpassword, $dbname);
			if(mysqli_connect_error()){
				die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
			}
			else{
				$sql="INSERT into login values('$username','$password')";
				if($conn->query("$sql")){
					header("location:validateForm.php");
					"alert('query ok')";
				}
				else{
					echo "Error:".$sql."<br>".$conn->error;
				}
				$conn->close();
			}
		}
		else{
			echo "Password should not be empty";
			die();
		}
	}
	else{
		echo "Username should not be empty";
		die();
	}
?>
