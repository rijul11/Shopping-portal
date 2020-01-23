<?php
	//Create connection to mysql
	$host="localhost";
	$dbusername="user";
	$dbpassword="password";
	$dbname="login1";
	$conn=new mysqli ($host,$dbusername, $dbpassword, $dbname);
	
	session_start();//Start a session
	$user_check = $_SESSION['login_user'];//Store the session
	
	// SQL Query To Fetch Complete Information Of User
	$query = "SELECT username from login where username = '$user_check'";
	$ses_sql = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['username'];
?>