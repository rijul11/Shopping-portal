<?php
session_start();
$error='';
if(isset($_POST['login'])){
	if(empty($_POST['username'])||empty($_POST['password'])){
		$error="Username or Password Invalid";
	}
	else{
		$username=filter_input(INPUT_POST,'username');
		$password=filter_input(INPUT_POST,'password');
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
			$query="SELECT username,password from login where username=? AND password=? LIMIT 1";
			$stmt=$conn->prepare("$query");
			$stmt->bind_param("ss",$username,$password);
			$stmt->execute();
			$stmt->bind_result($username,$password);
			$stmt->store_result();
			
			if($stmt->fetch()){
				$_SESSION['login_user']=$username;
				header("location:profile.php");
			}
			else{
				$error="Username or Password Invalid";
				echo $error;
			}
			mysqli_close($conn);
		}
	}
}
else{
	echo "login failed";
}
?>
				
				